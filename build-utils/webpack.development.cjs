const { SourceMapDevToolPlugin } = require('webpack');

const config = {
    devtool: 'cheap-module-source-map',
    plugins: [new SourceMapDevToolPlugin({})],
};

module.exports = config;