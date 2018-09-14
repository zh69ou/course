const merge = require('webpack-merge');
const common = require('./webpack.common.js');
const webpack = require('webpack');
const CleanWebpackPlugin = require('clean-webpack-plugin');

module.exports = merge(common,{
	devtool: 'inline-source-map',
	plugins: [
		new CleanWebpackPlugin(['public/js','public/css','public/demo','public/ico']),
  	new webpack.NamedModulesPlugin(),
  	new webpack.HotModuleReplacementPlugin()
	],
	target: "web"
});