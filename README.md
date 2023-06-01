<!--markdown tutorial-->


<img  align="center" src="./images/sl1.png" width="900" title="Self Learing image"/>

 <br/>
 
---
  <br/>

# Table of Contents

- [Introduction](#introduction)
- [Data pass to view blade file](#data-pass)
  - [Using the view() function](#view-function)
  - [Using the with() method](#with-method)
  - [Using the compact()](#compact)
  - [Fetch the data in the controller](#fetch-the-data)
- [Abstraction Vs Interfaces](#abstraction-interfaces)
  - [What is the trait in PHP](#trait-in-php)
- [Laravel Add a new column to existing table in a migration](#add-column)
  - [Normal Way](#normal-way)
  - [Way of the foreign key](#way-of-foreign-key)
- [Types of delete for Laravel](#types-of-delete)
  - [Soft Delete](#soft-delete)
  - [Hard Delete](#hard-delete)
- [Laravel Eloquent ORM](#laravel-eloquent)
- [ @stack() and @push() @endpush](#stack-push)
  - [Stack](#stack)
  - [Push](#push)
- [Use of Foreign key](#use-foreign-key)
- [Database Relationship](#database-relationship)
  - [One to One](#one-2-one)
  - [One to Many](#one-2-many)
  - [Has One Through](#has-1-through)
  - [Many to Many Relation](#many-2-many)
  - [Many to many polyMorphic Relationship](#many-2-many-polymorphic)
- [Query Parameter](#query-parameter)
- [Mail Notification](#mail_notification)
- [Localization Language Switcher](#localization_language_switcher)
- [Learn Database](#learn_database)
    - [Primary key VS Unique key](#primary_key_vs_unique_key)

- [SOLID Design Principles](#solid)
  - [Single Responsibility Principle](#srp)
  - [Open-Closed Principle](#ocp)
  - [Liskov Substitution Principleh](#lsp)
  - [Interface Segregation Principle](#isp)
  - [Dependency Inversion Principle](#dip)

- [Mini Project](#project)

<br/>
<br/>
<br/>

# Introduction <a name="introduction"></a>

<p>When I learn in daily life, then I put the main topic with an explanation. Because of I quick remind in my valuable information. So, under the same table of content.</p> 

<br/>
<br/>
# List of topic

 | SI No         | Topic                  |
 | ------------ | ---------------------- |
 | 01 | Data pass to view blade file  |
 | 02 | Abstraction Vs Interfaces |
 | 04 | Laravel Add a new column to existing table in a migration|
 | 05 | Types of delete Laravel |
 | 06 | Laravel Eloquent ORM |
 | 07 | @stack() and      @push()      @endpush |
 | 08 | Foreign key use  |
 | 09 | Database Relationship |
 | 10 | Query Parameter |

<!-- all link is here -->

<br/>
<br/>
<br/>


## Data pass to view blade file <a name="data-pass"></a>

### 1. Using the view() function <a name="view-function"></a>

<p>You can use the view() function to return a view and pass data to it as an array or an instance of the Illuminate\Contracts\Support\Arrayable interface.

 For example:
</p>

<br/>

```php
 public function index()
    {
        $data = [
            'title' => 'Welcome to my website',
            'content' => 'This is some content that will be displayed on the page',
        ];
        return view('my-view', $data);
    }
```

<br/>



### 2. Using the with() method: <a name="with-method"></a>
<p> You can also use the with() method to pass data to the view. This method allows you to chain multiple calls together to pass multiple pieces of data.
 
 For example:
</p>

<br/>

```php
 public function index()
{
    return view('my-view')
        ->with('title', 'Welcome to my website')
        ->with('content', 'This is some content that will be displayed on the page');
}

```

<br/>
<p> For example:</p>

```php
 use App\Models\Post;
    use App\Models\User;
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('my-view', ['posts' => $posts]);
    }

```

<br/>

#### View blade file by foreach loop:

```php
 @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>Author: {{ $post->user->name }}</p>
    @endforeach

```

<br/>



### 3. Using the compact() : <a name="compact"></a>
<p> You can use the compact() function to create an array of variables and their values, which can then be passed to the view. 

 For example:

</p>

<br/>

```php
 public function index()
{
    return view('my-view')
        ->with('title', 'Welcome to my website')
        ->with('content', 'This is some content that will be displayed on the page');
}

```

<br/>

### 4. Fetch the data in the controller : <a name="fetch-the-data"></a>
<p> In your controller, you can fetch the data from the database using the model you just created.

 For example:

</p>

<br/>

```php
 use App\Models\Post;
    public function index()
    {
        $posts = Post::all();
        return view('my-view', ['posts' => $posts]);
    }
    
```

<br/>

#### View blade file by foreach loop:

```php
 @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>Author: {{ $post->user->name }}</p>
    @endforeach


```

<br/>

## Abstraction Vs Interfaces: <a name="abstraction-interfaces"></a>

### Abstraction : 
 <p> The main reason for using abstraction is to hide unnecessary details from the user. Only relevant data from a large program is shown to the user. It also helps to reduce the complexity of the program. </p>

 <br/>

### Interfaces : 
 <p> An interface is a layer of communication with a system. If you press various buttons on the mobile then there is an interface part: </p>


 <p> Definition of interfaces. It says what the interface can do. Actions are "abstract" to you, you don't know what's going on inside. Implementation of an interface, which tells exactly how the interface works. </p>

<br/>


 | SI No      | Abstract Class           |        Interface       |
 | ---------- | ------------------------ | ---------------------- |
 | 01 | An abstract class can contain both abstract and non-abstract methods.  | Interface contains only abstract methods. |
 | 02 | To declare abstract class abstract keywords are used. | The interface can be declared with the interface keyword.|
 | 03 | It supports multiple inheritance. | It does not support multiple inheritance.|
 | 04 | The keyword ‘extend’ is used to extend an abstract class | The keyword implement is used to implement the interface.|
 | 05 | It has class members like private and protected, etc. | It has class members public by default.|

<br/>
<br/>
<br/>




### What is the trait in PHP: <a name="trait-in-php"></a>

### 1. Using the view() function

<p>Usually PHP is called Single Inheritance Language, that is, PHP Language does not support Multiple Inheritance. And Trait is a new concept to remove the limitations of Single Inheritance in PHP OOP and use Multiple Inheritance. which was first used in PHP 5.4. Traits are much like classes, Traits are defined like classes using the trait keyword. However, an object like a class cannot be created from it. But properties and methods of multiple traits can be used in a single class. Now let's understand better through an example:</p>

<br/>
<h3>File Name: foo.php </h3>

<br/>

```php
 <?php
        trait Foo
        {
            public function sayHello(){
                return "Hello";
            }
            public function sayWorld(){
            return "World";
            }
        }
    ?>
```

 
<br/>

<h3>Trait is used in classes using the use keyword. Let's look at an example using trait : </h3>

<br/>
<h4>File Name: bar.php</h4>


```php
 <?php
        include("foo.php");
        class Bar{
            // Using the Trait Here
            use Foo;
        }
        $obj = new Bar;
        // Executing the method from trait
        $obj->sayHello(); //Hello
        $obj->sayWorld(); // World
        ?>

```

<br/>

## Laravel Add a new column to existing table in a migration: <a name="add-column"></a>

### 1. Normal Way: <a name="normal-way"></a>
 
<br/>
<!-- ![profile](./images/me.jpg) -->
<img  align="center"  src="images/1.png" width="600" title="User Table"/>

<br/>

### Step 1 :
#### Terminal command


```bash
php artisan make:migration add_address_to_users_table --table=users

```
<br/>

### Step 2 :
#### Add new migration file
```php
public function up(): void{
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable()->after('phone');
        });
    }

    public function down(): void{
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
        });
    }

```
<br/>

### Step 3 :
#### Terminal command 
```bash 
php artisan migrate

```

## Output :
<img  align="center"  src="images/address.png" width="600" title="Add a Address Column "/>
<br/>
<br/>

### Way of the foreign key: <a name="way-of-foreign-key"></a>
 
<br/>
<!-- ![profile](./images/me.jpg) -->
<img  align="center"  src="images/3.png" width="600" title="User Table"/>
<br/>

### Step 1 :
#### Terminal command
```bash
php artisan make:migration add_address_to_users_table --table=users

```
<br/>

### Step 2 :
#### Add new migration file
```php
public function up(): void
    {
        Schema::table(customers, function (Blueprint $table) {
            // 1. Create new column
            // You probably want to make the new column nullable
            $table->integer('customer_id')->unsigned()->nullable()->after('password');


            // 2. Create foreign key constraints
            $table->foreign('customer_id')->references('id')->on('stores')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(customers, function (Blueprint $table) {
            // 1. Drop foreign key constraints
                $table->dropForeign(['customer_id']);
            // 2. Drop the column
                $table->dropColumn('customer_id');
        });
    }

```
<br/>

### Step 3 :
#### Terminal command 
```bash
php artisan migrate

```

## Output :
<img  align="center"  src="images/4.png" width="600" title="Add a Address Column "/>


<br/>

## Types of delete for Laravel:<a name="types-of-delete"></a>

### Soft Delete :<a name="soft-delete"></a> 
 <p>  Soft delete is a feature in Laravel that allows you to delete records without actually removing them from the database. Instead, Laravel marks the record as "deleted" by adding a timestamp to the deleted_at column of the table. This makes it possible to recover deleted records if needed. To use soft delete, you need to add the SoftDeletes trait to your model class and add a deleted_at column to your database table. </p>

 <img  align="center"  src="images/5.png" width="600" title="Soft delete"/>
<br/>

### Demo Products Table :
<img  align="center"  src="images/6.png" width="600" title="Add a Address Column "/>
<br/>

### Step 1 :
#### Go to Product Model and use SoftDeletes 
```php
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes;
}

```
<br/>

### Step 2 :
#### Terminal command 
```bash
php artisan make:migration add_deleted_at_to_products_table --table=products

```
<br/>
<br/>

### Step 3 :
#### add_deleted_at_to_products_table   of include
```php
public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->softDeletes();
        });
    }
public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }

```
<br/>
<br/>

### Step 4 :
#### Terminal command 
```bash
php artisan migrate

```
<br/>

## Demo Products Table output :
<img  align="center"  src="images/7.png" width="600" title="Demo Products Table output"/>
<br/>

### ProductController softDelete
```php
    public function trash(){
        return view('admin.product.trash-product', [
            'products' => Product::onlyTrashed()->get()
        ]);
    }


    public function undo($id){
        $product = Product::withTrashed()->find($id);
        $product->restore();
        return redirect('/product-trash')->with('message', 'Product restore successfully! and go to manage Page');
    }

```
<br/>

### ProductController Hard Delete <a name="hard-delete"></a>
```php
    public function forceDelete($id){
        $product = Product::withTrashed()->find($id);
        $product->forceDelete();
        return redirect('/product-trash')->with('message', 'Product Delete successfully! ');
    }

```
<br/>

### Hard Delete : 
 <p>Hard delete is the traditional way of deleting records from a database. When you perform a hard delete, the record is completely removed from the database, and there is no way to recover it. To perform a hard delete in Laravel, you can use the delete() method on your model instance or the DB::delete() method if you want to delete records using a raw SQL query. </p>

<br/>

## Laravel Eloquent ORM:<a name="laravel-eloquent"></a>

### English Short note : 
<p> ORM stands for Object-Relational Mapping. It is a technique that developers use an object-oriented programming method Allows you to interact with relational databases. Generally, developers have to write different types of SQL queries to interact with the database. which is time-consuming and error-prone. With an ORM, developers can work with objects in the programming language of their choice. Simply put, ORM objects act as translators between developers and their databases. Basically, ORMs provide an abstraction layer between the application code and the database. Which makes code easier to write and maintain. ORMs Developers with low-level database details such as tables, columns and SQL statements Allows working with high-level abstractions like objects and classes instead of functions.
ORMs are usually database query, data insert, update and delete and tables
Provides functionality to manage relationships between These often include features such as caching, database migrations and schema management.
Overall, ORM reduces the amount of repetitive code required to interact with the database and Can simplify the development of database-driven applications by providing an easier way to work with data. </p>

### Bangla Short note : 
<p> ORM যা মূলত Object-Relational Mapping এর সংক্ষিপ্ত রূপ। এটি এমন একটি কৌশল যা ডেভেলপারদের একটি object-oriented programming Method ব্যবহার করে relational database এর সাথে যোগাযোগ করতে দেয়।
সাধারণত, ডেভেলপারদেরকে ডাটাবেসের সাথে ইন্টারঅ্যাক্ট করার জন্য বিভিন্ন ধরণের SQL query গুলো লিখতে হয়, যা সময়সাপেক্ষ এবং এবং অনেক ভুল থাকতে পারে। একটি ORM-এর সাহায্যে, ডেভেলপাররা তাদের পছন্দের programming language এর object গুলোর সাথে কাজ করতে পারে। আরো সহজ করে বললে ORM object ডেভেলপারদের এবং তাদের ডাটাবেসের মধ্যে ট্রান্সলেটর এর ভূমিকা পালন করে।
মূলতঃ ORM গুলি application code এবং database এর মধ্যে একটি abstraction layer প্রদান করে, যা কোড লেখা এবং বজায় রাখা সহজ করে তোলে। ORM গুলি ডেভেলপারদের low-level database details যেমন table সমূহ, columns এবং SQL statements এর সাথে কাজ করার পরিবর্তে objects এবং class গুলোর মতো high-level abstractions নিয়ে কাজ করার অনুমতি দেয়। 

ORM গুলো সাধারণত database query, data insert, update এবং delete করা এবং Table গুলোর মধ্যে relationships manage করার জন্য ফাঙ্কশনালিটি প্রদান করে। এগুলি প্রায়শই caching, ডাটাবেস migrations এবং schema management এর মতো features গুলি অন্তর্ভুক্ত করে।
সামগ্রিকভাবে, ORM ডাটাবেসের সাথে ইন্টারঅ্যাক্ট করার জন্য প্রয়োজনীয় repetitive code এর পরিমাণ হ্রাস করে এবং ডেটার সাথে কাজ করার আরও সহজ উপায় প্রদান করে database-driven application গুলির development কে সহজ করতে পারে।
</p>

#### For Example insert query  
```php
DB::table('users')->insert([
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
]);

```

#### For Example update  query  
```php
DB::table('users')
    ->where('id', 1)
    ->update(['name' => 'John Doe', 'email' => 'johndoe@example.com']);

```

#### For Example delete query  
```php
DB::table('users')->where('id', 1)->delete();

```
[ORM Link](https://w3programmers.com/bangla/eloquent-basics/ "ORM Link")




<br/>



## @stack() and @push() @endpush::<a name="stack-push"></a>

### For Example @stack : <a name="stack"></a>

####  app.blade.php
```php
    <html>
    <head>
        <title>Website</title>
        @stack('head-scripts')
    </head>


    <body>
        <main>@yield('content')</main>

    @stack('body-scripts')
    </body>
    </html>
```
### For Example  @push : <a name="push"></a>

####  home.blade.php
```php
    @extends('layouts.app')
    @section('content')
        <div>Hello World</div>

        @push('body-scripts')
            @once
            <script src="https://unpkg.com/imask"></script>
            @endonce
        @endpush
    @endsection
```

<br/>
<br/>

## Use of Foreign key <a name="use-foreign-key"></a>

<p>In a relational database, a foreign key is a column or a set of columns that refers to the primary key or a unique key of another table. A foreign key constraint is a way to enforce referential integrity between the data in two tables.</p>

```php
   Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->foreign('user_id')->references('id')->on('users');
    // other columns...
});

```
```php
Schema::table('orders', function (Blueprint $table) {
    $table->unsignedBigInteger('user_id');
    $table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade');
});

```
<br/>
<br/>

## Database Relationship <a name="database-relationship"></a> 

---

<h2 align="center"><a name="one-2-one"> One to One</a></h2> 
 <br/>

### Migrate Customer Table 
```php
Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamps();
});

```

### Migrate Phone Table 
```php
Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->integer('customer_id');
            $table->timestamps();
        });

```
### For Customer Model 
```php
class Customer extends Model
{
    use HasFactory;
    public function phone()
    {
        return $this->hasOne(Phone::class);
    }
}

```
### For Phone Model 
```php
 class Phone extends Model
{
    use HasFactory;
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

```

### Controller Function 
```php
public function oneToOne(){
         $customers = Customer::all();
        return view('eloquentRelationship.oneToOne', compact('customers'));
    }

```

### View For blade file
```php
@foreach($customers as $data)
    <tr>
        <th scope="row">{{ $data->id }}</th>
        <td>{{ $data->name }}</td>
        <td>{{ $data->email }}</td>
        <td>{{ $data->phone->name }}</td>
        <td>{{ $data->phone->model }}</td>
        <td>
            <button type="button" class="btn btn-outline-primary">Edit</button>
            <button type="button" class="btn btn-outline-danger">Delete</button>
        </td>
    </tr>
@endforeach

```

<br/>

<h2 align="center"><a name="one-2-many"> One to Many</a></h2> 

 <br/>

### Comment Model  
```php
class Comment extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
```
### Post Model  
```php
class Post extends Model
{
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
```

<h2 align="center"><a name="has-1-through">Has One Through </a></h2> 

 <br/>

### There have a three Table
- Mechanics
- Cars
- Woners
 <br/>

<img  align="center"  src="./images/8.png" width="700" title="Mechanics image"/>
<img  align="center"  src="./images/9.png" width="700" title="Cars image"/>
<img  align="center"  src="./images/10.png" width="700" title="Woners image"/>

<br/>

### Mechanic Model  
```php
class Mechanic extends Model
{
    use HasFactory;

    public function carWoner()
    {
        return $this->hasOneThrough(Woner::class, Car::class);
    }
    public function carModel()
    {
        return $this->hasOne(Car::class);
    }
}

```


<br/>

### Controller method   
```php
public function hasOneThrough(){

    $mechanic = Mechanic::with('carWoner')->get();
    return view('eloquentRelationship.hasOneThrough', compact('mechanic'));
}

```


<br/>

## Output

<img  align="center" src="./images/11.png" height="250" width="700" title="Output image"/>



<h2 align="center"><a name="many-2-many">Many to Many Relation </a></h2> 

 <br/>

### There have a three Table
- Produces
- Tags
- Product-Tags
 <br/>

### Produces Table   
```php
public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->timestamps();
        });
    }
```
 <br/>

### Tag Table   
```php
public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag_name');
            $table->timestamps();
        });
    }
```
 <br/>

### ProducesTag Table   
```php
public function up(): void
    {
        Schema::create('product_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->timestamps();
        });
    }
```
<br/>

## Relation three Model
- 
### Produces Model   
```php
    protected $gureded = [];

    function tags(){
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
```
 
 
 ### Tag Model   
```php
    protected $gureded = [];

    function products(){
        return $this->belongsToMany(Product::class, 'product_tags');
    }
```

### ProducesTag Model   
```php
    protected $gureded = [];
```
 
<br/>

## Sevaral way show  Output

```php
   //return Product::with('tags')->find(2);
   return Tag::with('products')->get();
```
 <br/>
  <br/>
   <br/>
  <br/>

<h2 align="center"><a name="many-2-many-polymorphic">Many to many polyMorphic Relationship </a></h2> 

<br/>
<br/>
<img  align="center" src="./images/poly-relationship.png" height="350" width="700" title="poly-relationship"/>
<br/>

### This is the comment table Schema: 

```php
Schema::create('comments', function (Blueprint $table) {
    $table->increments('id');
    $table->morphs('commentable');
    $table->text('comment')->nullable();
    $table->timestamps();
});

```

<br>

### This is Image Model comment Function

```php
public function comments()
{
    return $this->morphMany(Comment::class,'commentable');
     //App\Models\ImageModel
}
```

<br>

### This is Post Model comment Function

```php
public function comments()
{
    return $this->morphMany(Comment::class,'commentable');
                //App\Models\PostModel
}
```


<br>

### How to get All post with comment By HomeController 

```php
function blogIndex(){
    $post = PostModel::with('comments')->orderBy('id', 'desc')->take(4)->get();
    return view('website.pages.blog_page',compact('post') );
}

```


<br>

### How to get All Image with comment By HomeController 

```php
function imageIndex(){
        $image = ImageModel::with('comments')->orderBy('id', 'desc')->take(6)->get();


        return view('website.pages.image_page',compact('image'));
     }
```

[Polymorphic Relationships Link](https://blog.logrocket.com/polymorphic-relationships-laravel/ "Polymorphic Relationships Link")

<br>
<br>


# Query Parameter <a name="query-parameter"></a> 
 <br/>

<p>A query parameter, also known as a query string parameter or URL parameter, is a way to pass data from a client (such as a web browser) to a server as part of a URL.</p>


<p>Query parameters are added to the end of a URL after a question mark ? and consist of one or more key-value pairs, separated by an ampersand &. For example, consider the following URL with query parameters: </p>

[Link](https://example.com/search?q=apple&category=fruits "Query Parameter Link")




<p>In this URL, q and category are the keys, and apple and fruits are the corresponding values. The server can extract the values of these parameters and use them to perform a search or filter the results.</p>

<br/>
<br/>

# Mail Notification use Mailtrap<a name="mail_notification"></a> [All source Code Link](https://github.com/mushahadur/Mail_Notification_use_Mailtrap "Mail Notification use Mailtrap")

### Step 01.
 - Sing up mailtrap
 - Go to inbox here
 - Go to SMTP Settings here
 - Go to Integrations here
 - select Laravel 7+

<img  align="center"  src="./images/use_Mailtrap.png" width="700" title="use_Mailtrap image"/>

- Copy under the code
```php
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=ee0274de4b6ef0
MAIL_PASSWORD=52591df55f34a5
MAIL_ENCRYPTION=tls
```

  <img  align="center"  src="./images/use_Mailtrap2.png" width="700" title="use_Mailtrap2 image"/>

- Replace the code from .env file by copy code
```php
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=ee0274de4b6ef0
MAIL_PASSWORD=52591df55f34a5
MAIL_ENCRYPTION=tls
```

  <img  align="center"  src="./images/use_Mailtrap3.png" width="700" title="use_Mailtrap2 image"/>

- And also replace the code from .env file by login your mail to mailtrap
```php
MAIL_FROM_ADDRESS="example@gmail.com"
```

  <img  align="center"  src="./images/use_Mailtrap4.png" width="700" title="use_Mailtrap2 image"/>

<br/>

### Step 02.
 - Make a blade file for upload-data/ form
 - like

```php 
<div class="card">
              <div class="card-header"><h3>Form Card</h3></div>
                <form class="p-5" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="name" name="name" class="form-control" >
                      @error('name')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" >
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div> 
```


- Make a controller

```bash 
php artisan make:controller ContactController

```

- Route setup 

```php 
use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

```


 - Make send method to ContactController

```php 
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


    public function send(Request $request){
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
        ]);

        $data = $request;
        Mail::to(request('email'))->send(new Contact($data));
        return redirect()->back();
    }

``` 


- Make a php class for mail Contact

```bash 
php artisan make:mail Contact

```

- Customize the mail Contact class

```php  
    public $data;
    public function __construct($data)
    {
        $this->data = $data; //this data is glabal data that get autometically view email file
    }
    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'This is your mail subject',
        );
    }
    
    
    public function content()
    {
        return new Content(
            view: 'email.email',  //this is your blade file path that is send to mailtrap inbox
        );
        
    }
```

- This is your email blade file that get data 

```php  
            <div class="card p-5">
              <div class="card-header"><h4>This is your new email</h4></div>
               <h4 class="py-3">Name is : {{ $data->name }}  </h4>
               <h4 class="py-3">Email is : {{ $data->email }}  </h4>
            </div> 
```

- Then you submit button you get email notification in your mailtrap

  <img  align="center"  src="./images/use_Mailtrap5.png" width="600" title="use_Mailtrap2 image"/>
  <img  align="center"  src="./images/use_Mailtrap6.png" width="700" title="use_Mailtrap2 image"/>


<br/>

# Localization Language Switcher <a name="localization_language_switcher"></a> [All source Code Link](https://github.com/mushahadur/Localization-Language-Switcher "Localization Language Switcher")

<p>In this learn I will go over on how we can implement a multi-language website in Laravel using Laravel Localization and also create a simple language switcher to change the default language.</p>

### Step 01.

- First of all I take the fresh Laravel Project
```bash 
composer create-project laravel/laravel Localization-Language-Switcher
```

### Step 02.

- Make a middleware Class
```bash 
php artisan make:middleware Language
```
- Middleware class handle-method 
```php 
use Illuminate\Support\Facades\App;


    public function handle($request, Closure $next)
    {
        if (Session()->has('applocale') AND array_key_exists(Session()->get('applocale'), config('languages'))) {
            App::setLocale(Session()->get('applocale'));
        }
        else { // This is optional as Laravel will automatically set the fallback language if there is none specified
            App::setLocale(config('app.fallback_locale'));
        }
        return $next($request);
    }
```


### Step 03.

- Add the middleware entry into the Kernel.php file
```php 
use App\Http\Middleware\Language;


    protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        // \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \App\Http\Middleware\Language::class,                       // Add this middleware 
    ],
```

### Step 04.
- Create a new file named languages.php inside the config directory

```php 
<?php
return [
    'en' => 'English',
    'bn' => 'বাংলা',
    'hn' => 'हिंदी',
];
```
### Step 05.

- Create new controller
```bash 
php artisan make:controller LanguageController
```

- Setup a  LanguageController
```php 
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


   public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
```

### Step 06.
- Setup a  Route
```php 
use App\Http\Controllers\LanguageController;

Route::get('lang/{lang}',[LanguageController::class, 'switchLang'])->name('lang.switch');
```

### Step 07.
- Open the app.blade.php file located under resources > views > layouts and add 


```php 
       <div class="dropdown d-inline-block px-5">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        <span class="d-none d-xl-inline-block ml-1">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Config::get('languages')[App::getLocale()] }}
                            </a>
                        </span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                        @endif
                    @endforeach
                    </div>
                </div>
```

- We can show out put 

  <img  align="center"  src="./images/lang.png" width="700" title="lang image"/>


### Step 08.
- Setup a lang folder  step by step || resources->lang->en->menu.php 
- Setup a lang folder  step by step || resources->lang->bn->menu.php 
- Setup a lang folder  step by step || resources->lang->hn->menu.php

  <img  align="center"  src="./images/lang2.png" width="700" title="lang image"/>

### Step 09.
- menu.php inside bn directory
```php 
<?php

return[
    'menu' => 'তালিকা',
    'dashboard' => 'ড্যাশবোর্ড',

    'company_module' => 'কোম্পানির মডিউল',
    'company_manage' => 'কোম্পানি পরিচালনা করুন',

    'company_add' => 'নতুন কোম্পানি যোগ করুন',
    'employee_module' => 'কর্মচারী মডিউল',

    'employee_add' => 'নতুন কর্মচারী যোগ করুন',
    'employee_manage' => 'কর্মচারী পরিচালনা করুন',


    'search' => 'অনুসন্ধান করুন',
    'history' => '1971 সালের মার্চ মাসে বাংলাদেশের স্বাধীনতার ঘোষণার ফলে নয় মাসব্যাপী বাংলাদেশের স্বাধীনতা যুদ্ধ শুরু হয়।',
 ];
```

- menu.php inside en directory
```php 
<?php

return[
    'menu' => 'Menu',
    'dashboard' => 'Dashboard',
    'company_module' => 'Company Module',
    'company_manage' => 'Manage Company',
    'company_add' => 'Add Company',
    'employee_module' => 'Employee Module ',
    'employee_add' => 'Add Employee',
    'employee_manage' => 'Manage Employee',
    'search' => 'Search',
    'history' => 'Proclamation of Bangladeshi Independence in March 1971 led to the nine-month long Bangladesh Liberation War.',
 ];
```

- menu.php inside hn directory
```php 
<?php

return[
    'menu' => 'मेन्यू',
    'dashboard' => 'डैशबोर्ड',
    'company_module' => 'कंपनी मॉड्यूल',
    'company_manage' => 'कंपनी का प्रबंधन करें',
    'company_add' => 'कंपनी जोड़ें',
    'employee_module' => 'कर्मचारी मॉड्यूल',
    'employee_add' => 'कर्मचारी जोड़ें',
    'employee_manage' => 'कर्मचारी को प्रबंधित करें',
    'search' => 'खोज',
    'history' => 'मार्च 1971 में बांग्लादेशी स्वतंत्रता की घोषणा ने नौ महीने लंबे बांग्लादेश मुक्ति युद्ध का नेतृत्व कियाी।',
 ];
```
- Output 

  <img  align="center"  src="./images/lang3.png" width="700" title="lang image"/>




 <br/>
<br/>
<br/> 
<br/>
<br/>
<br/>

# Learn Database <a name="learn_database"></a>


## Primary key VS Unique key <a name="primary_key_vs_unique_key"></a>

### Primary Key
<p>The primary key is a unique or non-null key that uniquely identifies every record in that table or relation. The primary key column cannot store duplicate values that mean primary key column values are always unique. It is also called a minimal super key; therefore, we cannot specify more than one primary key in any relationship. A primary key column of one table can be referenced by a foreign key column of another table.</p>


### Unique Key
<p>The unique key is a single column or combination of columns in a table to uniquely identify database records. A unique key prevents from storing duplicate values in the column. A table can contain multiple unique key columns, unlike a primary key column. This key is similar to the primary key, except that one NULL value can be stored in the unique key column.</p>

| Comparison Basis         | Primary Key                  | Unique Key                  |
| ----------------------- | ---------------------------- |  ---------------------------- |
| Basic | The primary key is used as a unique identifier for each record in the table. |The unique key is also a unique identifier for records when the primary key is not present in the table.|
| NULL | We cannot store NULL values in the primary key column.|We can store NULL value in the unique key column, but only one NULL is allowed.|
| Purpose | It enforces entity integrity.|It enforces unique data.|
| Index | The primary key, by default, creates clustered index.|The unique key, by default, creates a non-clustered index.|
| Number of Key |Each table supports only one primary key.|A table can have more than one unique key.|
| Value Modification |We cannot change or delete the primary key values.|We can modify the unique key column values.|
| Uses | It is used to identify each record in the table. | It prevents storing duplicate entries in a column except for a NULL value. |



<br/>
<br/>

# SOLID Design Principles<a name="solid"></a>

<img  align="center"  src="./images/l.png"  title="SOlID image"/>

### SOLID Design Principles in Software Development

#### SOLID is a set of five design principles. These principles help software developers design robust, testable, extensible, and maintainable object-oriented software systems.

<p>The SOLID design principles are a subcategory of many principles introduced by the American computer scientist and instructor, Robert C. Martin (A.K.A Uncle Bob) in a 2000 paper.</p> 

- Single Responsibility Principle
- Open-Closed Principle
- Liskov Substitution Principle
- Interface Segregation Principle
- Dependency Inversion Principle


<br>

## Single Responsibility Principle<a name="srp"></a>
<p>Single-responsibility Principle (SRP) states:
A class should have one and only one reason to change, meaning that a class should have only one job.</p>

<br>

<p>For Example ..</p>

### -Step 01: 

<p>Create a new Folder "Repositories"</p>
<img  align="center"  src="./images/solid_srp.png" width="600" title="use_Mailtrap image"/>


## Open-Closed Principle<a name="ocp"></a>

## Liskov Substitution Principle<a name="lsp"></a>

## Interface Segregation Principle<a name="isp"></a>
## Dependency Inversion Principle<a name="dip"></a>


<br/>
<br/>
# Mini-CRM <a name="project"></a> 
 <br/>
<br/>
<br/>

# Adminpanel to manage companies
 - Use Repository Pattern.
 - Basic Laravel Auth: ability to log in as administrator.
 - Use database seeds to create first user with email admin@admin.com and password "password".
 - CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.
 - Companies DB table consists of these fields: Name (required), email, logo (minimum 100x100), website
 - Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone
 - Use database migrations to create those schemas above
 - Store companies logos in storage/app/public folder and make them accessible from public.
 - Use basic Laravel resource controllers with default methods - index, create, store etc.
 - Use Laravel's validation function, using Request classes.
 - Use Laravel's pagination for showing Companies/Employees list, 10 entries per page.
 - Use Laravel's starter kit for auth and basic theme, but remove ability to register.
 - Email notification: send email whenever a employee is assign to a company(use Mailtrap).
 - Make the project multi-language (using lang folder) (Bangla & English).
 - No need to add any extra design. Only Laravel Breeze design.
 - Follow Single Responsibility Principle.
 - Follow DRY (Don't Repeat Yourself) principle.

<br/>
<br/>


























