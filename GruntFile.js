/*!
 * CountryCaptionChallenge Gruntfile
 * @author Joel Brubaker
 */
 
'use strict';
 
/**
 * Grunt Module
 */
module.exports = function(grunt) {
	/**
	 * Configuration
	 */
	grunt.initConfig({
	 	/**
	 	 * Get package meta data
	 	 */
	 	pkg: grunt.file.readJSON('package.json'),

	 	/**
	 	 * Sass
	 	 */
	 	sass: {
	 	  dist: {
	 	    files: {
	 	      'public/css/style.css': 'app/assets/src/scss/style.scss'
	 	    }
	 	  }
	 	},

	 	/**
	 	 * Watch
	 	 */
	 	watch: {
	 	  css: {
	 	    files: 'app/assets/src/scss/{,*/}*.{scss,sass}',
	 	    tasks: ['sass'],
	 	    options: {
	 	    	livereload: true
	 	    }
	 	  }
	 	}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default',['watch']);

};