const webpack = require('webpack');
const path = require('path');
const commonPaths = require(path.resolve(__dirname, 'common-paths.cjs'));
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = (mode) => {
    // Compiling for dev?
    const isDev = mode === 'development' ? true : false;
    return {
        entry: {
            main: {
                import: `${commonPaths.entries}/index.js`,
                filename: 'js/main.js',
            },
        },
        context: path.resolve(__dirname, '../'),
        mode,
        output: {
            path: `${commonPaths.output}`,
            filename: `[name].js`,
        },
        plugins: [
            new webpack.ProgressPlugin(),
            new MiniCssExtractPlugin({ filename: 'css/style.css' }),
        ],
        module: {
            rules: [
                {
                    test: /\.(js)$/,
                    exclude: /node_modules/,
                    use: {
                        loader: 'babel-loader',
                    },
                    resolve: {
                        fullySpecified: false,
                        enforceExtension: false,
                    },
                },
                {
                    test: /\.scss$/,
                    use: [
                        { loader: MiniCssExtractPlugin.loader, options: {} },
                        {
                            loader: 'css-loader', // translates CSS into CommonJS}
                            options: {
                                sourceMap: true,
                            },
                        },
                        {
                            loader: 'postcss-loader',
                            options: {
                                postcssOptions: (loaderContext) => {
                                    const envPlugins = isDev
                                        ? [
                                              require('autoprefixer')({
                                                  grid: true, // CSS Grid in autoprefixer - @see https://css-tricks.com/css-grid-in-ie-css-grid-and-the-new-autoprefixer/
                                              }),
                                          ]
                                        : [
                                              require('autoprefixer')({
                                                  grid: true, // CSS Grid in autoprefixer - @see https://css-tricks.com/css-grid-in-ie-css-grid-and-the-new-autoprefixer/
                                              }),
                                              require('cssnano'),
                                          ];
                                    return { plugins: envPlugins };
                                },
                                sourceMap: true,
                            },
                        },
                        {
                            loader: 'sass-loader',
                            options: {
                                sourceMap: true,
                            },
                        }, // compiles Sass to CSS, using Node Sass by default
                    ],
                },
            ],
        },
        resolve: {
            extensions: ['.js'],
            fullySpecified: false,
            enforceExtension: false,
        },
    };
};