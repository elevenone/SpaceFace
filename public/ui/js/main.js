// doc ready function
// VanillaJs
// document.addEventListener("DOMContentLoaded", function(event) {  code here  });
function docReady(cb) {
    if (document.readyState != 'loading'){
        cb(); 
    } else {
        document.addEventListener('DOMContentLoaded', cb);
    }
}

//
docReady(launch);

//
function launch()
{
    console.log("launch ...");
    pfetchrun();
}

//
function pfetchrun()
{
    // pfetch
    // https://github.com/andrewpillar/pfetch
    console.log("pfetchrun ...");
    pfetch.run({
        filterHtml: false,
        defaultContainer: "#maincontent"
    });

    pfetch.on("beforeFetch", function(init) {
        init.headers["X_Pfetch"] = "true";
    });

    pfetch.on("beforeReplace", function(container) {
        console.log("beforeReplace");
    });

    pfetch.on("afterReplace", function(container) {
        console.log("afterReplace");
    });
}