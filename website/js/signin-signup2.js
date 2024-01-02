function validateForm1() {
    var selectElement = document.getElementById("mySelect1");
    var selectedValue = selectElement.value;
    
    if (selectedValue === "") {
      alert("Please select an option");
      return false; // Prevent form submission
    }
    
    return true; // Allow form submission
  }

  function validateForm2() {
    var selectElement = document.getElementById("mySelect2");
    var selectedValue = selectElement.value;
    
    if (selectedValue === "") {
      alert("Please select an option");
      return false; // Prevent form submission
    }
    
    return true; // Allow form submission
  }  