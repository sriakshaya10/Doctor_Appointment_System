const hospitalData = {
  Vijayawada: ["Vyshu Multi Speciality Hospital"],
  Nellore: ["Vandana Super Speciality Hospital"], 
  Hyderabad: ["Asritha Multi Speciality Hospital"],
  Eluru: ["Renu's Super Speciality Hospital"],
  Visakhapatnam: ["RK Beach MultiCare Hospital"]
};

const departments = ["Gynecology", "Pediatrics", "Endocrinology", "General Physician", "Psychiatry"];

const doctorData = {
  Vijayawada: {
    "Gynecology": ["Dr. Rajesh Kumar", "Dr. Sneha Reddy"],
    "Pediatrics": ["Dr. Srinivas Varma", "Dr. Anusha Reddy"],
    "Endocrinology": ["Dr. Abhiram Varma", "Dr. Manju Shree Devi"],
    "General Physician": ["Dr. Chaitanya Kumar", "Dr. Uma Reddy"],
    "Psychiatry": ["Dr. Ravi Kiran", "Dr. Tejaswini"]
  },
   Nellore: {
    "Gynecology": ["Dr. Bharath Kumar", "Dr. Sriya Reddy"],
    "Pediatrics": ["Dr. Jyothish", "Dr. Yashmitha"],
    "Endocrinology": ["Dr. GunaSekar", "Dr. Pavani Naidu"],
    "General Physician": ["Anil Kumar", "Dr. Supraja Varma"],
    "Psychiatry": ["Dr. Srinivas", "Dr. Anshu Reddy"]
  },
  Hyderabad: {
    "Gynecology": ["Dr. Rakesh", "Dr. Suguna"],
    "Pediatrics": ["Dr. Giri Babu", "Dr. Mohana"],
    "Endocrinology": ["Dr. Kamal", "Dr. Chithra"],
    "General Physician": ["Dr. Raja", "Dr. Vithya"],
    "Psychiatry": ["Dr. Subramanyam", "Dr. Sujatha"]
  },
  Eluru: {
    "Gynecology": ["Dr. Chandra Mouli", "Dr. Sri Devi"],
    "Pediatrics": ["Dr. Shashank", "Dr. Rushitha"],
    "Endocrinology": ["Dr. Rishith Varma", "Dr. Srinidhi"],
    "General Physician": ["Dr. Bhargav", "Dr. Jyothirmayi"],
    "Psychiatry": ["Dr. Sai Abhinay", "Dr. Vyshnavi"]
  },
  Visakhapatnam: {
    "Gynecology": ["Dr. Somesh", "Dr. Bhargavi"],
    "Pediatrics": ["Dr. Surya Prathap Nayak", "Dr. Esha"],
    "Endocrinology": ["Dr. Sravan Kumar", "Dr. Deepika"],
    "General Physician": ["Dr. Ram Nandhan", "Dr. Hema Priya"],
    "Psychiatry": ["Dr. Rithwik Varma", "Dr. Nithya Reddy"]
  }
};

function updateHospitals() {
  const location = document.getElementById("location").value;
  const hospitalSelect = document.getElementById("hospital");
  hospitalSelect.innerHTML = '<option value="">Select Hospital</option>';
  if (hospitalData[location]) {
    hospitalData[location].forEach(hospital => {
      const option = document.createElement("option");
      option.value = hospital;
      option.text = hospital;
      hospitalSelect.appendChild(option);
    });
  }
  document.getElementById("department").innerHTML = '<option value="">Select Department</option>';
  document.getElementById("doctor").innerHTML = '<option value="">Select Doctor</option>';
}

function updateDepartments() {
  const departmentSelect = document.getElementById("department");
  departmentSelect.innerHTML = '<option value="">Select Department</option>';
  departments.forEach(dep => {
    const option = document.createElement("option");
    option.value = dep;
    option.text = dep;
    departmentSelect.appendChild(option);
  });
  document.getElementById("doctor").innerHTML = '<option value="">Select Doctor</option>';
}

function updateDoctors() {
  const location = document.getElementById("location").value;
  const department = document.getElementById("department").value;
  const doctorSelect = document.getElementById("doctor");
  doctorSelect.innerHTML = '<option value="">Select Doctor</option>';
  if (doctorData[location] && doctorData[location][department]) {
    doctorData[location][department].forEach(doc => {
      const option = document.createElement("option");
      option.value = doc;
      option.text = doc;
      doctorSelect.appendChild(option);
    });
  }
}
