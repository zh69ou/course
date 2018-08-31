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
			sourceMap: true
		}),
		new webpack.DefinePlugin({
    	PRODUCTION: JSON.stringify(true),
      BROWSER_SUPPORTS_HTML5: true
    })
	],
  mode: 'production',
	target: "web"
});