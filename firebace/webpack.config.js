var path = require("path"),
    webpack = require('webpack'),
    chalk = require('chalk'),
    ScriptExtHtmlWebpackPlugin = require('script-ext-html-webpack-plugin'),
    copyWebpackPlugin = require('copy-webpack-plugin'),
    ExtractTextPlugin = require('extract-text-webpack-plugin'),
    HtmlWebpackPlugin = require('html-webpack-plugin');

const DEV_MODE = process.env.NODE_ENV === 'development';

const colorFun = DEV_MODE ? chalk.black.bgYellow : chalk.bgCyan.white;
console.log(colorFun(`DEV_MODE = ${DEV_MODE} , process.env.NODE_ENV = ${process.env.NODE_ENV}`));


const toFilename = (name, ext = 'js') => {
    const units = [name, '.', ext];
    if (!DEV_MODE) {
        const hashStr = (ext === 'css' ? '-[contenthash]' : '-[chunkhash]');
        units.splice(1, 0, hashStr);
    }
    return units.join('');
};

var config = {
    context: path.resolve('src'),
    entry: {
        app: ['./js/main.js'],
    },
    output: {
        filename: toFilename('assets/js/[name]'),
        chunkFilename: toFilename('assets/js/[name]'),
        path: path.resolve(__dirname, './dist'),
        publicPath: ''
    },
    // 'cheap-module-eval-source-map'; 
    //  "inline-source-map";   
    devtool: DEV_MODE ? 'inline-source-map' : false,
    resolve: {
        alias: {
            'vue': DEV_MODE ? path.resolve("node_modules/vue/dist/vue.js") : path.resolve("node_modules/vue/dist/vue.min.js"),
            'vuex': path.resolve("node_modules/vuex/dist/vuex.min.js"),
            'vue-router': path.resolve("node_modules/vue-router/dist/vue-router.min.js")
        },
        modules: [
            path.resolve('src/vue'),
            path.resolve('src/sass'),
            path.resolve('src/js'),
            path.resolve('src'),
            path.resolve("node_modules"),
        ],
        extensions: [".js",".vue"]
    },
    devServer: {
        hot: true,
        historyApiFallback: true,
        port: 3000,
        stats: {
            colors: true,
            hash: false,
            chunks: false,
            chunkModules: false,
        },
    }
};
config.module = {
    // https://webpack.js.org/configuration/module/#module-rules
    rules: [{
            test: /\.vue$/,
            loader: 'vue-loader',
            include: path.resolve('src/vue'),
            exclude: /node_modules/,
            options: {
                preserveWhitespace: false,
                extractCSS: false,
                stylus: 'stylus-loader',
            }
        },
        {
            test: /\.js$/,
            loader: 'babel-loader',
            include: [
                path.resolve('src/js'),
                path.resolve('src/lib')
            ],
            exclude: /node_modules/,
        },
        {
            test: /\.(jpe?g|png|gif|svg|ico)$/i, //to support eg. background-image property 
            loader: "url-loader",
            include: path.resolve('src/images'),
            exclude: /node_modules/,
            options: {
                limit: 1024,
                name: DEV_MODE ? '' : '/' + 'assets/images/[name].[ext]?[hash:8]',
            }
        },
        {
            test: /\.(woff(2)?|ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/, //to support @font-face rule 
            loader: "url-loader",
            include: path.resolve('src/fonts'),
            exclude: /node_modules/,
            options: {
                name: DEV_MODE ? '' : '/' + 'assets/fonts/[name].[ext]?[hash:8]',
            }
        },
        {
            test: /\.s[a|c]ss$/,
            exclude: /node_modules/,
            use: [{
                loader: "style-loader!css-loader!resolve-url-loader"
            }, {
                loader: "sass-loader",
                options: {
                    sourceMap: DEV_MODE
                }
            }]
        },
        {
            test: /\.pug$/,
            loader: 'pug-loader',
            exclude: /node_modules/,
            options: {
                pretty: DEV_MODE,
                pretty: true,
                self: true,
            }
        }
    ]
};

config.plugins = [
    new ExtractTextPlugin({
        filename: toFilename('css/app', 'css'),
        disable: DEV_MODE,
    }),

    new HtmlWebpackPlugin({
        template: 'html/index.template.pug',
        data: { 
            DEV_MODE
        }
    }),
    new ScriptExtHtmlWebpackPlugin({
        defaultAttribute: 'defer',
    }),
    new webpack.DefinePlugin({
        DEV__: DEV_MODE,
        'process.env': {
            NODE_ENV: JSON.stringify(DEV_MODE ? 'development' : 'production'),
        },
    }),
    //  http://vue-loader.vuejs.org/en/workflow/production.html
    ...DEV_MODE ? [
        new webpack.HotModuleReplacementPlugin()
    ] : [
        new webpack.optimize.UglifyJsPlugin({
            // sourceMap: true,
            compress: {
                warnings: false
            }
        }),
    ]
];
module.exports = config;