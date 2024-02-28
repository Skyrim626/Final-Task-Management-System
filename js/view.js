
// Get the value of select
const defaultSelect = document.querySelector("[data-priority]");
const priorityLevel = defaultSelect.getAttribute('data-priority');

if(priorityLevel === "low") {
    defaultSelect.children["0"].setAttribute("selected", '');
}

else if(priorityLevel === "medium") {
    defaultSelect.children["1"].setAttribute("selected", '');
}

else if(priorityLevel === "high") {
    defaultSelect.children["2"].setAttribute("selected", '');
}

/* console.log(defaultSelect.children["0"]); */
