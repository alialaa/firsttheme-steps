import gulp from 'gulp';
import yargs from 'yargs';

const PRODUCTION = yargs.argv.prod;

export const hello = (done) => {
    console.log(PRODUCTION);
    done();
}

export default hello;