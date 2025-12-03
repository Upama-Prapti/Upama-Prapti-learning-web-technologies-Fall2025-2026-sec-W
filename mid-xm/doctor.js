var usageCount = {
    "Dashboard": 0,
    "Patient Profiles": 0,
    "Appointments": 0,
    "Prescriptions": 0,
    "Lab Results": 0,
    "Messages": 0
};

var sidebar = document.getElementById("sidebar");
var items = document.querySelectorAll(".menu-item");
var content = document.getElementById("content");

for (var i = 0; i < items.length; i++) {
    items[i].onclick = function() {
        var name = this.id;
        usageCount[name]++;
        content.innerHTML = "<h2>" + name + "</h2><p>Usage count: " + usageCount[name] + "</p>";
        reorderMenu();
    };
}

function reorderMenu() {
    var sortedItems = Object.entries(usageCount);
    sortedItems.sort(function(a, b) {
        return b[1] - a[1];
    });

    sidebar.innerHTML = "<h3>Doctor's Panel</h3>";

    for (var i = 0; i < sortedItems.length; i++) {
        var name = sortedItems[i][0];
        var count = sortedItems[i][1];
        var div = document.createElement("div");
        div.className = "menu-item";
        div.id = name;
        div.innerHTML = name;
        
        if (count >= 2) {
            div.style.fontWeight = "bold";
            div.style.backgroundColor = "yellow";
        }
        
        div.onclick = function() {
            var clickedName = this.id;
            usageCount[clickedName]++;
            content.innerHTML = "<h2>" + clickedName + "</h2><p>Usage count: " + usageCount[clickedName] + "</p>";
            reorderMenu();
        };
        
        sidebar.appendChild(div);
    }
}

