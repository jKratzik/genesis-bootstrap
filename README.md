# Movelize
A Genesis starter child theme that applies Bootstrap grid CSS classes to the Genesis HTML markup through custom filters and actions. The theme filters the Genesis CSS classes to apply the Bootstrap `container` `row`and `column grid`classes.
Those modifications are done in *lib/bootstrap/bootstrap-markup.php*.

Don't edit this file to apply your changes. Instead, hook into the actions and filters that have been defined by Movelize or Genesis.
For example to change the container class to `container-fluid`you can place this code into your theme's functions.php:
```
add_filter( 'mov_container_class', 'child_container_class' );
function child_container_class() {
    return 'container-fluid';
}
```
