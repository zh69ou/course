const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const HtmlWebpackPlugin = require('html-webpack-plugin');
const HtmlWebpackHarddiskPlugin = require('html-webpack-harddisk-plugin');

module.exports = {
  entry: {
    index: './assets/js/index.js',
    login: './assets/js/login.js'
  },
  devServer: {
    contentBase: './public'
  },
  output: {
    path: path.resolve(__dirname, './public/'),
    publicPath:'/',
    chunkFilename: 'js/[name].js',
    filename: 'js/[name].js'
  },
  resolve: {
    extensions: ['.js', '.vue', '.json', 'scss', 'sass'],
    alias: {
      'vue$': 'vue/dist/vue.esm.js'
    }
  },
  plugins: [
    new ExtractTextPlugin({
      filename:  (getPath) => {
        return getPath('css/[name].css');
      },
      allChunks: true
    }),
    new HtmlWebpackPlugin({
      filename: 'demo/index.html',
      template: './assets/view/index.html',
      // hash: true,
      minify: {
        minimize: true,
        removeConments: true,
        collapseWhitespace: true,
        minifyCSS: true,
        minifyJS: true
      },
      chunks : 'index'
    }),
    new HtmlWebpackHarddiskPlugin()
  ],
  optimization: {
    splitChunks: {
      cacheGroups: {
        commons: {
          name: "pub",
          chunks: "initial",
          minSize: 0,
          minChunks: 2,
          enforce:true
        },
        vue: {
          test: /vue/,
          name: "vue",
          chunks: "initial",
          minSize: 0,
          minChunks: 2,
          enforce:true
        }
      }
    }
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ExtractTextPlugin.extract({
          fallback: "style-loader",
          use: "css-loader"
        })
      },
      {
        test: /\.(html)$/,
        use: {
         loader: 'html-loader',
         options: {
           attrs: [':data-src']
         }
        }
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              outputPath: 'ico/'
            }
          }
        ]
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf)$/,
        use: [
          'file-loader'
        ]
      },
      {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            {
              loader: 'css-loader',
              options: {
                url: false,
                    minimize: true,
                    sourceMap: true
              }
            },
            {
              loader: 'sass-loader',
              options: {
                    sourceMap: true
                }
            }]
        })
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          loaders: {
            js: 'babel-loader!eslint-loader',
            scss: 'vue-style-loader!css-loader!sass-loader',
            sass: 'vue-style-loader!css-loader!sass-loader?indentedSyntax'
          }
        }
      }
    ]
  }
};