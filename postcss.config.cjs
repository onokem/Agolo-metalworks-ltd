module.exports = {
    plugins: [
        require('postcss-import'),
        require('postcss-nesting'),
        require('tailwindcss'),
        require('postcss-combine-duplicated-selectors')({
            removeDuplicatedProperties: true,
        }),
        require('postcss-combine-media-query'),
        require('autoprefixer'),
        require('cssnano')({
            preset: ['default', {
                discardComments: {
                    removeAll: true,
                },
                normalizeWhitespace: false,
            }],
        }),
    ],
};
