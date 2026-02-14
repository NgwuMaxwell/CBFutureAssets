/* --------------------------------------------------------------------------
 * File        : config-theme.js
 * Author      : indonez
 * Author URI  : http://www.indonez.com
 *
 * Indonez Copyright 2020 All Rights Reserved.
 * -------------------------------------------------------------------------- 
 * javascript handle initialization
    1. Slideshow
    2. Counter
    3. Mobile nav button
    4. Tradingview widget
 * -------------------------------------------------------------------------- */

'use strict';

const HomepageApp = {
    //----------- 1. Slideshow -----------
    theme_slideshow: function() {
        new CarouselConfig({
            fadeTransition: false,    
            darkMode: true,
            interval: 6000,
            control: {
                hide: true,
                onHover: false
            },
            indicators: {
                hide: false,
                onHover: false
            },
            height: {
                desktop: '570px',
                tablet: '436px',
                phone: '360px'
            }
        }).init();
    },
    //---------- 2. Counter -----------
    theme_counter: function() {
        new CounterUp({
            selector: '.count',
            start: 0,
            duration: 3200,
            intvalues: true,
            interval: 50
        }).start()
    },
    //---------- 3. Mobile nav button -----------
    theme_mobilenav: function() {
        new MobileNavbar({
            addonButtons: true,                 // options to use addon buttons, set it "false" if you won't use addon buttons
            buttons: [
                {
                    name: 'Login',              // button name
                    url: '/signin.html',        // button url
                    type: 'primary',            // button type (default, primary, secondary, danger, text)
                    icon: 'sign-in-alt'         // button icon, you can use all icons from here : https://fontawesome.com/icons?d=gallery&s=solid&m=free
                },
            ]
        }).init();
    },
    //---------- 4. Tradingview widget -----------
    theme_tradingview: function() {
        const path = location.pathname;

        if(path.includes('index') || !path.includes('.html')) {
            new TradingviewWidget({
                element: "#tradingview-widget",
                height: 361,
                type: "market-overview",
                theme: "light",
                symbol: [                       // array of instruments symbol based on Tradingview
                    {s: "FX:EURUSD"},
                    {s: "FX:GBPUSD"},
                    {s: "FX:USDJPY"},
                    {s: "FX:USDCHF"},
                    {s: "FX:AUDUSD"},
                    {s: "FX:USDCAD"}
                ]
            }).init()
        }
        if(path.includes('homepage3')) {
            new TradingviewWidget({
                element: "#tradingview-widget",
                height: 387,
                type: "symbol-overview",
                theme: "light",
                symbol : "GOOGL"                // symbol based on Tradingview
            }).init()
        }
    },
    theme_init: function() {
        HomepageApp.theme_slideshow();
        HomepageApp.theme_counter();
        HomepageApp.theme_mobilenav();
        HomepageApp.theme_tradingview();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    HomepageApp.theme_init();
});