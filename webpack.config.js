const path = require('path');

// css extraction and minification
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

// clean out build dir in-between builds
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

// Linting
const StylelintPlugin = require('stylelint-webpack-plugin');

// Additional Variables
const env = require('./env-webpack');

module.exports = [
  {
    entry: {
      main: ['./scss/main.scss', './js/global.js'],
    },
    output: {
      path: path.resolve(__dirname, 'dist'),
    },
    module: {
      rules: [
        // loader for images and icons (only required if css references image files)
        {
          test: /\.(png|jpg|jpeg|svg)$/,
          type: 'asset/resource',
          generator: {
            filename: './css/img/[name][ext]',
          },
        },
        // scss compilation, autoprefix
        {
          test: /\.(sass|scss)$/,
          use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader'],
        },
      ],
    },
    plugins: [
      // clear out build directories on each build
      new CleanWebpackPlugin({
        cleanOnceBeforeBuildPatterns: ['./dist/css/*'],
      }),
      // css extraction into dedicated file
      new MiniCssExtractPlugin({
        filename: './css/main.min.css',
      }),
      new StylelintPlugin({
        customSyntax: require('postcss-scss'),
        configFile: '.stylelintrc',
        exclude: ['node_modules', 'lib', 'dist', 'style.css'],
      }),
      new BrowserSyncPlugin(env.options, { reload: true }),
    ],
    optimization: {
      // minification - only performed when mode = production
      minimizer: [new CssMinimizerPlugin()],
    },
    resolve: {
      alias: {
        img: path.resolve(__dirname, '/assets/img'),
        icon: path.resolve(__dirname, '/assets/icons'),
      },
    },
  },
];
