> [!WARNING]
>
> This package can only be used with the `database` driver for the Sessions. This is how it is done in Jetstream, so keep this in mind as it may turn you off knowing you need to manage sessions in the database.

# Logout Other Browser Sessions

**Forked from [cjmellor/browser-sessions](https://github.com/cjmellor/browser-sessions)**

*I modified this package so I can return the session ID for revoking specific/single sessions. Thought I'd publish it in case anyone else wanted to do the same.

This package allows you to log out sessions that are active on other devices.

You may find this useful if you have logged in on a different device, or you have let someone else use your account, or you have forgotten to log out of a public computer. It can especially be useful if you see suspicious device activity on your account.

> [!NOTE]
> 
> This code has been extracted from [Laravel Jetstream](https://jetstream.laravel.com) and cannot be used outside a Laravel application.

## Installation

You can install the package via Composer:

```bash
composer require harrisonratcliffe/browser-sessions-enhanced
```

##Publishing the Configuration

To publish the configuration file for this package, run the following Artisan command:

```bash
php artisan vendor:publish --provider="Harrisonratcliffe\BrowserSessionsEnhanced\BrowserSessionsEnhancedServiceProvider"
```
This will copy the browser-sessions.php configuration file to your application's config directory, allowing you to customize its settings.

### Configurable Options
You can customize the following options in the published config/browser-sessions.php file:

`include_session_id: (default: false)`

Set to true to include the session ID in the response when retrieving the current user's sessions.
`include_ip_address: (default: false)`

Set to true to include the IP address of the session in the response when retrieving the current user's sessions. This can be useful for security purposes.

## Usage

### Retrieving A User's Current Sessions

Use the `BrowserSessions` facade to retrieve all the current user's sessions:

```php
BrowserSessions::sessions();
```

This will return an object with some information about each session:

```php
[
  {
    "device": {
      "browser": "Safari",
      "desktop": true,
      "mobile": false,
      "platform": "OS X"
    },
    "ip_address": "127.0.0.1",
    "is_current_device": true,
    "last_active": "1 second ago"
  }
]
```

### Logging Out Other Browser Sessions

Use the `BrowserSessions` facade to log out all the user's other browser sessions:

```php
BrowserSessions::logoutOtherBrowserSessions();
```

> [!NOTE]
> 
> A `password` must be sent along to the method to confirm the user's identity. Only then will the sessions be removed. See below on how you would implement this.

### Views

The package does not come with any pre-defined views to use. Here is an example though on how this could be implemented

In your `routes/web.php` file add the following route:

```php
Route::delete('logout-browser-sessions', function () {
    BrowserSessions::logoutOtherBrowserSessions();

    return back()->with('status', 'Logged out of other browser sessions.');
})->name('logout-browser-sessions');
```

Then in your view, you can add a form to submit a `DELETE` request to the above route:

```html
<form method="POST" action="{{ route('logout-browser-sessions') }}">
    @csrf
    @method('DELETE')
    
    <x-text-input label="Password" name="password" placeholder="Enter password" type="password" />
    
    <button type="submit">Logout Other Sessions</button>
</form>
```

## Retrieve the Users' Last Activity

Get the users' last activity by using the `getUserLastActivity` method:

```php
BrowserSessions::getUserLastActivity();
```

You can also view the date in a human-readable format:

```php
BrowserSessions::getUserLastActivity(human: true);
```

## Credits

 - [Chris Mellor](https://github.com/cjmellor)
 - [Harrison Ratcliffe](https://github.com/harrisonratcliffe)

## License

The MIT Licence (MIT). Please see [Licence File](LICENSE) for more information.
