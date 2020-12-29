<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CollectionController extends Controller
{
    public function example()
    {
        $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
       print_r(strtoupper($name));

 
    
    });
    $avg = collect([
        ['size' => 'tall', 'price' => 2.50],
        ['size' => 'grande', 'price' => 3.45],
        ['size' => 'venti', 'price' => 4.75]
    ])->avg('price');
    
    $collection = collect([1, 2, 3, 4, 5, 6, 7]);
    $chunks = $collection->chunk(4);
    $chunks->toArray();
    $countby = $collection->countby();



        $collection = collect([
            ['color' => 'blue', 4, 2],
            ['x', 'y', 'color' => 'red', 'shape' => 'circle', 300],
            ['make' => 'Acura', 'type' => 'NSX']
        ]);
        $collapse=$collection->collapse();
        print_r($collapse);
        $result = $collapse->contains(function ($key, $value){
            return ($key == 'color' and $value == 'blue');
        });
        print_r($result);

        
        
     
    

    // $collection = collect(['name', 'age']);
    // $combined = $collection->combine(['George', 29]);
    // $combined->all();

    // $collectionA = collect([1, 2, 3]);
    // $collectionB = $collectionA->collect();
    // $collectionB->all();

    $lazyCollection = LazyCollection::make(function () {yield 1; yield 2; yield 3;});
    $collection = $lazyCollection->collect();
    get_class($collection);
    $collection->all();
    $collectionA = collect([1, 2]);

$matrix = $collectionA->crossJoin(['a', 'b'], ['I', 'II']);

$matrix->all();

$collectionC = collect([
    'one' => 10,
    'two' => 20,
    'three' => 30,
    'four' => 40,
    'five' => 50,
]);

$diff = $collectionC->diffKeys([
    'two' => 2,
    'four' => 4,
    'six' => 6,
    'eight' => 8,
]);

$diff->all();



$employees = collect([
    ['email' => 'abigail@example.com', 'position' => 'Developer'],
    ['email' => 'james@example.com', 'position' => 'Designer'],
    ['email' => 'victoria@example.com', 'position' => 'Developer'],
]);

$employees->duplicates('position');


    $collectionE = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
 
    $collectionE->each(function ($value) {
        if ($value > 5) {
            return false;
        }
        echo $value * $value . '<br>';
    });


        $every = collect([
            ['red', 'green', 'blue'],
            ['apple', 'orage', 'lemon'],
            ['yaba', 'daba', 'doo'],
            ['hip', 'hop', 'hooray'],
            ['meat', 'potatoes', 'gravy'],
            ['apple pie', 'pumpkin latte', 'apple cider'],
        ]);
     
        $every->every(2);

        $except = collect(['product_id' => 1, 'price' => 100, 'discount' => false]);

        $filtered = $except->except(['price', 'discount']);
        
        $filtered->all();

        

    $filter = collect([
        ['red', 'green', 'blue'],
        ['apple', 'orange', 'lemon'],
        ['yaba', 'daba', 'doo'],
        ['hip', 'hop', 'hooray'],
        ['meat', 'potatoes', 'gravy'],
        ['apple pie', 'pumpkin latte', 'apple cider'],
    ]);
 
    $filterizedA = $filter->filter(function ($item) {
        return str_contains('lemon', $item);
    });
 
  
    $collectionG = collect([
        ['sunshine', 'blue sky', 'blue water'],
        ['apple pie', 'yellow', 'black roof'],
        [1,2,3],
        'random stuff',
        'not a number',
        ['apple crisp', 'jackolantern'],
    ]);
 
    $first = $collectionG->first();
 
    $collection = collect([
        ['name' => 'Sally'],
        ['school' => 'Arkansas'],
        ['age' => 28]
    ]);
    
    $flattened = $collection->flatMap(function ($values) {
        return array_map('strtoupper', $values);
    });
    
    $flattened->all();
    $flatt = collect([
        'Apple' => [
            ['name' => 'iPhone 6S', 'brand' => 'Apple'],
        ],
        'Samsung' => [
            ['name' => 'Galaxy S7', 'brand' => 'Samsung']
        ],
    ]);
    
    $products = $flatt->flatten(1);
    
    $products->values()->all();
    $forget = collect(['name' => 'taylor', 'framework' => 'laravel']);

$forget->forget('name');

$forget->all();

$forpage = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);

$chunk = $forpage->forPage(2, 3);

$chunk->all();

$froup = collect([
    ['account_id' => 'account-x10', 'product' => 'Chair'],
    ['account_id' => 'account-x10', 'product' => 'Bookcase'],
    ['account_id' => 'account-x11', 'product' => 'Desk'],
]);

$grouped = $froup->groupBy('account_id');

$grouped->toArray();

$inter = collect(['Desk', 'Sofa', 'Chair']);

$intersect = $inter->intersect(['Desk', 'Chair', 'Bookcase']);

$intersect->all();

$key = collect([
    ['product_id' => 'prod-100', 'name' => 'Desk'],
    ['product_id' => 'prod-200', 'name' => 'Chair'],
]);

$keyed = $key->keyBy('product_id');

$keyed->all();


Collection::macro('toUpper', function () {
    return $this->map(function ($value) {
        return Str::upper($value);
    });
});

$collectionU = collect(['first', 'second']);

$upper = $collectionU->toUpper();
print_r($upper);


$pad = collect(['A', 'B', 'C']);

$padA = $pad->pad(5, 0);

$padA->all();
$collection = collect([1, 2, 3, 4, 5, 6]);

list($underThree, $equalOrAboveThree) = $collection->partition(function ($i) {
    return $i < 3;
});

print_r($underThree->all());


print_r($equalOrAboveThree->all());

$collectionP = collect([1, 2, 3]);

$piped = $collectionP->pipe(function ($collectionP) {
    return $collectionP->sum();
});

$collectionT = collect([1, 2, 3]);

$total = $collectionT->reduce(function ($carry, $item) {
    return $carry + $item;
});

$collectionR = collect([1, 2, 3, 4]);

$reject = $collectionR->reject(function ($value) {
    return $value > 2;
});

$reject->all();
print_r($reject);
$collection1 = collect(['Taylor', 'Abigail', 'James']);

$replaced = $collection1->replace([1 => 'Victoria', 3 => 'Finn']);

$replaced->all();
print_r($replaced);

$collectionRecusive = collect(['Taylor', 'Abigail', ['James', 'Victoria', 'Finn']]);

$replaced1 = $collectionRecusive->replaceRecursive(['Charlie', 2 => [1 => 'King']]);

$replaced1->all();

$collectionsearch = collect([
    'flickr.com',
    'taboola.com',
    'costco.com',
    'nordstrom.com',
    'ancestry.com',
    'stackexhange.com'
])->search('stackexhange.com');

print_r($collectionsearch);




    $collectionshift = collect([
        'Deviantart.com',
        'Allrecipes.com',
        'Retailmenot.com',
        'Thesaurus.com',
    ])->shift();

    // $skip = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

    // $skip = $skip->skip(4);
    
    // $skip->all();

    $collectionslice = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

$slice = $collectionslice->slice(4);

$slice->all();
$sort = collect([0, 4, 9, 22, 123, 432, 1, 5, 77 ])->sort();

$sortby = collect([
    ['name' => 'Desk', 'colors' => ['Black', 'Mahogany']],
    ['name' => 'Chair', 'colors' => ['Black']],
    ['name' => 'Bookcase', 'colors' => ['Red', 'Beige', 'Brown']],
]);

$sorted = $sortby->sortBy(function ($product) {
    return count($product['colors']);
});

$sorted->values()->all();

$splice = collect([1, 2, 3, 4, 5]);

$chunk = $splice->splice(2, 1, [10, 11]);

$chunk->all();

// [3]

$splice->all();

$split=collect([1,23,4,5,6,7,8])->split(2);

$take = collect([0, 1, 2, 3, 4, 5]);

$chunk2 = $take->take(3);

$chunk2->all();
// $tap=collect([2, 4, 3, 1, 5])
//     ->sort()
//     ->tap(function ($collection) {
//         Log::debug('Values after sorting', $collection->values()->toArray());
//     })
//     ->shift();

$times = Collection::times(10, function ($number) {
    return $number * 9;
});

$times->all();
$Json = collect(['name' => 'Desk', 'price' => 200]);

$Json->toJson();

$transform = collect([1, 2, 3, 4, 5]);

$transform->transform(function ($item, $key) {
    return $item * 2;
});

$transform->all();

$collection3 = collect([1 => ['a'], 2 => ['b']]);

$union = $collection3->union([3 => ['c'], 1 => ['b']]);

$union->all();

$unique = collect([1, 1, 2, 2, 3, 4, 2])->unique();

$unless = collect([1, 2, 3]);

$unless->unless(true, function ($unless) {
    return $unless->push(4);
});

$unless->unless(false, function ($unless) {
    return $unless->push(5);
});

$unless->all();

$when = collect(['michael', 'tom']);

$when->whenEmpty(function ($when) {
    return $when->push('adam');
});

$when->all();
$where = collect([
    ['product' => 'Desk', 'price' => 200],
    ['product' => 'Chair', 'price' => 100],
    ['product' => 'Bookcase', 'price' => 150],
    ['product' => 'Door', 'price' => 100],
]);

$filteredW = $where->where('price', 100);

$filteredW->all();

$wherebet = collect([
    ['product' => 'Desk', 'price' => 200],
    ['product' => 'Chair', 'price' => 80],
    ['product' => 'Bookcase', 'price' => 150],
    ['product' => 'Pencil', 'price' => 30],
    ['product' => 'Door', 'price' => 100],
]);

$filteredB = $wherebet->whereBetween('price', [100, 200]);

$filteredB->all();
$whereIn = collect([
    ['product' => 'Desk', 'price' => 200],
    ['product' => 'Chair', 'price' => 100],
    ['product' => 'Bookcase', 'price' => 150],
    ['product' => 'Door', 'price' => 100],
]);

$filteredI = $whereIn->whereIn('price', [150, 200]);

$filteredI->all();

$wrap = Collection::wrap(collect('John Doe'));

$wrap->all();
$zip = collect(['Chair', 'Desk']);

$zipped = $zip->zip([100, 200]);

$zipped->all();
dd($zipped);

// $unwrap=Collection::unwrap(collect('John Doe'));

    return view('admin',compact('avg','tap','filteredW','wrap','zip','filteredI','filteredB','union','unique','when','unless','unwrap','transform','Json','times','skip','chunk2','split','sort','splice','sorted','slice','collectionshift','total','replaced1','padA','piped','keyed','forget','intersect','grouped','chunk','chunks','collapse','countby','matrix','diff','employees','every','filtered','filteredA','flattened','products'));
   
}
}
