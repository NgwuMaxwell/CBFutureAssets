const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js");

// Add Node.js polyfill fallbacks for webpack 5 compatibility
mix.webpackConfig({
    resolve: {
        fallback: {
            "crypto": require.resolve("crypto-browserify"),
            "stream": require.resolve("stream-browserify"),
            "fs": require.resolve("browserify-fs"),
            "path": require.resolve("path-browserify"),
            "http": require.resolve("stream-http"),
            "https": require.resolve("https-browserify"),
            "zlib": require.resolve("browserify-zlib"),
            "querystring": require.resolve("querystring-es3"),
            "constants": require.resolve("constants-browserify"),
            "net": require.resolve("net-browserify"),
            "tls": require.resolve("tls-browserify"),
            "os": require.resolve("os-browserify/browser"),
            "util": require.resolve("util"),
            "url": require.resolve("url/"),
            "assert": require.resolve("assert/"),
            "buffer": require.resolve("buffer/"),
            "vm": require.resolve("vm-browserify"),
            "child_process": false,
            "dgram": false,
            "dns": false,
            "domain": require.resolve("domain-browser"),
            "events": require.resolve("events/"),
            "readline": false,
            "repl": false,
            "string_decoder": require.resolve("string_decoder/"),
            "tty": require.resolve("tty-browserify"),
            "v8": false,
            "worker_threads": false
        }
    },
    plugins: [
        new (require('webpack')).ProvidePlugin({
            process: 'process/browser',
            Buffer: ['buffer', 'Buffer'],
        })
    ]
});

if (mix.inProduction()) {
    mix.version();
}
