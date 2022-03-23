const { merge } = require('webpack-merge');
const commonConfig = require('./build-utils/webpack.common.cjs');

module.exports = (env, argv) => {
    const { mode = 'production' } = argv;
    console.log({ mode });

    // eslint-disable-next-line global-require, import/no-dynamic-require
    const envConfig = require(`./build-utils/webpack.${mode}.cjs`);

    return merge(commonConfig(mode), envConfig);
};