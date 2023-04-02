const path = require('path')
const JS_DIR = path.resolve( __dirname, '/src/js');
const IMG_DIR = path.resolve( __dirname, '/src/img');
const BUILD_DIR = path.resolve( __dirname, '/src/js');

const entry = {
  main: JS_DIR + '/main.js',
  single: JS_DIR + '/single.js',
};
const output = {};
module.exports = (env, argv) => ({
  entry: entry,
  output: output,
});
