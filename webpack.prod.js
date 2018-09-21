const merge = require('webpack-merge');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const common = require('./webpack.common.js');
const webpack = require('webpack');
const CleanWebpackPlugin = require('clean-webpack-plugin');
module.exports = merge(common, {
	devtool: 'source-map',
	plugins: [
    new CleanWebpackPlugin(['public/js','public/css','public/demo','public/ico']),
		new UglifyJSPlugin({
			sourceMap: true,
			extractComments: false,
			cache: true,
      parallel: true,
			uglifyOptions: {
		    warnings: false,
		    parse: {},
		    compress: {},
		    mangle: false,
		    output: null,
		    toplevel: false,
		    nameCache: null,
		    ie8: false,
		    keep_fnames: false,
		  }
		}),
		new webpack.DefinePlugin({
    	PRODUCTION: JSON.stringify(true),
      BROWSER_SUPPORTS_HTML5: true
    })
	],
  mode: 'production',
	target: "web"
});