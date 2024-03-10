/**
 * __________________________________________________________________
 *
 * Phillipine Address Selector
 * __________________________________________________________________
 *
 * MIT License
 * 
 * Copyright (c) 2020 Wilfred V. Pine
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package Phillipine Address Selector
 * @author Wilfred V. Pine <only.master.red@gmail.com>
 * @copyright Copyright 2020 (https://dev.confired.com)
 * @link https://github.com/redmalmon/philippine-address-selector
 * @license https://opensource.org/licenses/MIT MIT License
 */

var my_handlers = {
    // fill province
    fill_provinces: function () {
        //selected country
        var country_code = $(this).val();

        // set selected text to input
        var country_text = $(this).find("option:selected").text();
        let country_input = $('#country-text');
        country_input.val(country_text);
        //clear province & city & barangay input
        $('#province-text').val('');
        $('#city-text').val('');
        $('#barangay-text').val('');

        //province
        let dropdown = $('#province');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
        dropdown.prop('selectedIndex', 0);

        //city
        let city = $('#city');
        city.empty();
        city.append('<option selected="true" disabled>Choose City/Municipality</option>');
        city.prop('selectedIndex', 0);

        //barangay
        let barangay = $('#barangay');
        barangay.empty();
        barangay.append('<option selected="true" disabled>Choose Barangay</option>');
        barangay.prop('selectedIndex', 0);

        // filter & fill
        var url = 'json/province.json';
        $.getJSON(url, function (data) {
            var result = data.filter(function (value) {
                return value.country_code == country_code;
            });

            result.sort(function (a, b) {
                return a.province_name.localeCompare(b.province_name);
            });

            $.each(result, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
            })

        });
    },
    // fill city
    fill_cities: function () {
        //selected province
        var province_code = $(this).val();

        // set selected text to input
        var province_text = $(this).find("option:selected").text();
        let province_input = $('#province-text');
        province_input.val(province_text);
        //clear city & barangay input
        $('#city-text').val('');
        $('#barangay-text').val('');

        //city
        let dropdown = $('#city');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose City/Municipality</option>');
        dropdown.prop('selectedIndex', 0);

        //barangay
        let barangay = $('#barangay');
        barangay.empty();
        barangay.append('<option selected="true" disabled>Choose Barangay</option>');
        barangay.prop('selectedIndex', 0);

        // filter & fill
        var url = 'json/city.json';
        $.getJSON(url, function (data) {
            var result = data.filter(function (value) {
                return value.province_code == province_code;
            });

            result.sort(function (a, b) {
                return a.city_name.localeCompare(b.city_name);
            });

            $.each(result, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
            })

        });
    },
    // fill barangay
    fill_barangays: function () {
        // selected barangay
        var city_code = $(this).val();

        // set selected text to input
        var city_text = $(this).find("option:selected").text();
        let city_input = $('#city-text');
        city_input.val(city_text);
        //clear barangay input
        $('#barangay-text').val('');

        // barangay
        let dropdown = $('#barangay');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose Barangay</option>');
        dropdown.prop('selectedIndex', 0);

        // filter & Fill
        var url = 'json/barangay.json';
        $.getJSON(url, function (data) {
            var result = data.filter(function (value) {
                return value.city_code == city_code;
            });

            result.sort(function (a, b) {
                return a.brgy_name.localeCompare(b.brgy_name);
            });

            $.each(result, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
            })

        });
    },

    onchange_barangay: function () {
        // set selected text to input
        var barangay_text = $(this).find("option:selected").text();
        let barangay_input = $('#barangay-text');
        barangay_input.val(barangay_text);
    },

};


$(function () {
    // events
    $('#country').on('change', my_handlers.fill_provinces);
    $('#province').on('change', my_handlers.fill_cities);
    $('#city').on('change', my_handlers.fill_barangays);
    $('#barangay').on('change', my_handlers.onchange_barangay);

    // load country
    let dropdown = $('#country');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Choose Country</option>');
    dropdown.prop('selectedIndex', 0);
    const url = 'json/country.json';
    // Populate dropdown with list of country
    $.getJSON(url, function (data) {
        $.each(data, function (key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.country_code).text(entry.country_name));
        })
    });

});

function validateForm() {
    // Check if any of the hidden input fields still have the default value
    if (document.getElementById("country").value === "" ||
        document.getElementById("province").value === "" ||
        document.getElementById("city").value === "" ||
        document.getElementById("barangay").value === "") {
        // Display an alert message
        alert("Please select an option for all dropdown menus.");
        // Prevent the form from being submitted
        return false;
    }
    // If all options are selected, allow the form submission
    return true;
}
