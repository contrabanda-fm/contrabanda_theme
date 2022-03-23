const TerserPlugin = require('terser-webpack-plugin');
const config = {
    devtool: false,
    optimization: {
        minimizer: [
            new TerserPlugin({
                terserOptions: {
                    format: {
                        comments: false,
                    },
                },
                extractComments: false,
            }),
        ],
    },
};

module.exports = config;