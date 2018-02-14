var now = new Date();
var hrs = now.getHours();
var echo = "Hello";
if(hrs >= 0) {
    echo = "Mornin' Sunshine!";
}
if(hrs >= 15) {
    echo = "Good morning";
}
if(hrs >= 12) {
    echo = "Good afternoon";
}
if(hrs >= 17) {
    echo = "Good evening";
}
if(hrs >= 22) {
    echo = "Go to bed!";
}