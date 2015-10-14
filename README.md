# cloudsearch-query-builder
Helper to build [structured CloudSearch queries](http://docs.aws.amazon.com/cloudsearch/latest/developerguide/search-api.html#structured-search-syntax)

[![Build Status](https://travis-ci.org/moee/cloudsearch_query_builder.svg?branch=master)](https://travis-ci.org/moee/cloudsearch_query_builder)

## Testing
### Using docker
    docker run -v $(pwd):/app composer/composer install
    docker run -v $(pwd):/app phpunit/phpunit /app
