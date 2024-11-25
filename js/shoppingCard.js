const btnSearch = document.getElementById("basic-addon2");
const inputSearch = document.getElementById("inputSearch");
const regex = /[^a-zA-Z0-9]/;



const searchFunction = (event) => {
    event.preventDefault();
    const searchedValue = inputSearch.value;

    //Checks if the input value is not empty and if it contains any speacial characters 

    if (!searchedValue || regex.test(searchedValue)) {

        alert('Speacial characters, or an empty field is not allowed!!!')
        return;
    }
    //The value is ready

    console.log(searchedValue);
    inputSearch.value = '';

}

// btnSearch.addEventListener('click', searchFunction);
