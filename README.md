<!--markdown tutorial-->

<h1 align="center">Mushahedur Rahman Khan </h1>
<br/>

<h2 align="center">Self Learing</h2>
 <br/>
 
---
 
## List of topic

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

<!-- all link is here -->

    
<br/>
<br/>
<br/>

## Data pass to view blade file 

###   1. Using the view() function

<p>You can use the view() function to return a view and pass data to it as an array or an instance of the Illuminate\Contracts\Support\Arrayable interface.

 For example:
</p>

<br/>

```
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



###   2. Using the with() method:
<p> You can also use the with() method to pass data to the view. This method allows you to chain multiple calls together to pass multiple pieces of data.
 
 For example:
</p>

<br/>

```
 public function index()
{
    return view('my-view')
        ->with('title', 'Welcome to my website')
        ->with('content', 'This is some content that will be displayed on the page');
}

```

<br/>
<p> For example:</p>

```
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

```
 @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>Author: {{ $post->user->name }}</p>
    @endforeach

```

<br/>





###   3. Using the compact() :
<p> You can use the compact() function to create an array of variables and their values, which can then be passed to the view. 

 For example:

</p>

<br/>

```
 public function index()
{
    return view('my-view')
        ->with('title', 'Welcome to my website')
        ->with('content', 'This is some content that will be displayed on the page');
}

```

<br/>

###   4. Fetch the data in the controller  :
<p> In your controller, you can fetch the data from the database using the model you just created.

 For example:

</p>

<br/>

```
 use App\Models\Post;
    public function index()
    {
        $posts = Post::all();
        return view('my-view', ['posts' => $posts]);
    }
    
```

<br/>

#### View blade file by foreach loop:

```
 @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>Author: {{ $post->user->name }}</p>
    @endforeach


```

<br/>

## Abstraction Vs Interfaces:

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




## What is the trait in PHP:

###   1. Using the view() function

<p>Usually PHP is called Single Inheritance Language, that is, PHP Language does not support Multiple Inheritance. And Trait is a new concept to remove the limitations of Single Inheritance in PHP OOP and use Multiple Inheritance. which was first used in PHP 5.4. Traits are much like classes, Traits are defined like classes using the trait keyword. However, an object like a class cannot be created from it. But properties and methods of multiple traits can be used in a single class. Now let's understand better through an example:</p>

<br/>
<h3>File Name: foo.php </h3>

<br/>

```
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


```
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

## Laravel Add a new column to existing table in a migration:

###   1. Normal Way:
 
<br/>
<!-- ![profile](./images/me.jpg) -->
<img src="images/1.png" width="600" title="User Table"/>

<br/>

### Step 1 :
#### Terminal command
```
php artisan make:migration add_address_to_users_table --table=users

```
<br/>

### Step 2 :
#### Add new migration file
```
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
```
php artisan migrate

```

## Output :
<img src="images/address.png" width="600" title="Add a Address Column "/>

###   1. Way of the foreign key:
 
<br/>
<!-- ![profile](./images/me.jpg) -->
<img src="images/3.png" width="600" title="User Table"/>
<br/>

### Step 1 :
#### Terminal command
```
php artisan make:migration add_address_to_users_table --table=users

```
<br/>

### Step 2 :
#### Add new migration file
```
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
```
php artisan migrate

```

## Output :
<img src="images/4.png" width="600" title="Add a Address Column "/>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


























