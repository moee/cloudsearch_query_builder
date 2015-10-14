# cloudsearch-query-builder
Helper to build [structured CloudSearch queries](http://docs.aws.amazon.com/cloudsearch/latest/developerguide/search-api.html#structured-search-syntax)

[![Build Status](https://travis-ci.org/moee/cloudsearch_query_builder.svg?branch=master)](https://travis-ci.org/moee/cloudsearch_query_builder)

## Usage
### Simple Term

    $term = new \CloudSearchQueryBuilder\Atom('term', 'star');
    echo strval($term);
    // Output: (term 'star')

### Specify Field

    $term = new \CloudSearchQueryBuilder\Atom('term', 'star', array('field' => 'name'));
    echo strval($term);
    // Output: (term field=name 'star')
    
### Joining Terms (or, and)

    $lefTerm = new \CloudSearchQueryBuilder\Atom('term', 'star');
    $rightTerm = new \CloudSearchQueryBuilder\Atom('term', 'moon');
    $joinedTerm = new \CloudSearchQueryBuild\Join('and', $leftTerm, $rightTerm);
    echo strval($joinedTerm);
    // Output: (and (term 'star') (term 'moon))
    
## Testing
### Using docker
    docker run -v $(pwd):/app composer/composer install
    docker run -v $(pwd):/app phpunit/phpunit /app
