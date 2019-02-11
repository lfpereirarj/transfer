
const path = require("path");


module.exports = {
  entry: ['./src/js/app.js'],
  output: {
    path: path.resolve(__dirname, '../../../../public/js/react'),
    publicPath: '/',
    filename: 'main.js'
  },
  mode: 'development',
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          query: {
            presets: ['react']
          }
        }
      },
      {
        test: (/\.(css|scss)$/),
        use: ['style-loader', 'css-loader', 'sass-loader', {
          loader: 'postcss-loader',
          options: {
            ident: 'postcss',
            plugins: () => [
              require('postcss-flexbugs-fixes'),
              require('css-mqpacker')({
                sort: true
              }),
              require('autoprefixer')({
                browsers: [
                  '>1%',
                  'last 4 versions',
                  'Firefox ESR',
                  'not ie < 9'
                ],
                flexbox: 'no-2009',
                grid: 'autoplace',
              }),
            ],
          },
        }]
      }
    ]
  }
};
