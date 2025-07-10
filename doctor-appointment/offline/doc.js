let hospitals = {
            "Vijayawada": { name: "Vyshu Multi Speciality Hospital",hospitalDetails: "Established: 1998 | Awarded Best Hospital 2023 | Contact : VyshuHospitals@gmail.com", img: "https://static.vecteezy.com/system/resources/previews/036/372/442/non_2x/hospital-building-with-ambulance-emergency-car-on-cityscape-background-cartoon-illustration-vector.jpg" },
            "Nellore": { name: "Vandana Super Speciality Hospital",hospitalDetails: "Established: 1986 | Excellence in Patient Care 2022 | Contact : VandanaHospitals@gmail.com", img: "https://img.freepik.com/free-vector/people-walking-sitting-hospital-building-city-clinic-glass-exterior-flat-vector-illustration-medical-help-emergency-architecture-healthcare-concept_74855-10130.jpg" },
            "Hyderabad": { name: "Asritha Multi Speciality Hospital",hospitalDetails: "Established: 1978 | Multi-Speciality Care | Contact : AsrithaHospitals@gmail.com", img: "https://t4.ftcdn.net/jpg/02/10/45/39/360_F_210453925_spHdLHUcDJS76oWKzFp4mQeCKW8WisER.jpg" },
            "Eluru": { name: "Renu's Super Speciality Hospital",hospitalDetails: "Established: 1995 | 24/7 Emergency Services | Contact : RenuHospitals@gmail.com",img:"https://thumbs.dreamstime.com/b/medical-office-rooms-hospital-building-interior-emergency-clinic-doctor-waiting-room-surgery-doctors-cartoon-vector-pharmacy-141652356.jpg" },
            "Visakhapatnam": { name: "RK Beach MultiCare Hospital",hospitalDetails: "Established: 1980 | Excellence in Surgery | Contact : rkHospitals@mail.com", img: "https://png.pngtree.com/thumb_back/fh260/background/20220507/pngtree-hospital-building-for-healthcare-cartoon-background-vector-illustration-with-image_1319911.jpg" }
        };
        
        let specializations = [
            { name: "Gynecology", img: "https://www.baghospital.com/SysTrack/BlogImage/1/ef7b358b-5aa2-48e4-a385-0791431315bc.png" },
            { name: "Pediatricsy", img: "https://media.istockphoto.com/id/1186366691/vector/pediatrics-word-concepts-banner.jpg?s=612x612&w=0&k=20&c=uXLEKGGPcRAoBOUkRzjmUnZClIJGW_mEWSZ9OiRtxjY=" },
            { name: "Endocrinology", img: "https://www.shutterstock.com/image-vector/endocrinologist-concept-thyroid-examination-doctor-260nw-1954249597.jpg" },
            { name: "General Physician", img: "https://images.vexels.com/content/144451/preview/general-medicine-doctor-illustration-poster-c816ef.png" },
            { name: "Psychiatry", img: "https://img.freepik.com/free-vector/psychiatrist-concept-mental-health-diagnostic-doctor-treating-human-mind-psychological-test-help-thoughts-emotions-analysis-vector-illustration-cartoon-style_613284-1400.jpg?semt=ais_hybrid" }
        ];

         let doctors = {
        "Vijayawada": {
            "Gynecology": [{ name: "Dr. Rajesh Kumar", gender: "Male" }, { name: "Dr. Sneha Reddy", gender: "Female" }],
            "Pediatrics": [{ name: "Dr. Srinivas Varma", gender: "Male" }, { name: "Dr. Anusha Reddy", gender: "Female" }],
			"Endocrinology": [{ name: "Dr. Abhiram Varma", gender: "Male" }, { name: "Dr. Manju Shree Devi", gender: "Female" }],
			"General Physician": [{ name: "Dr. Chaitanya Kumar", gender: "Male" }, { name: "Dr. Uma Reddy", gender: "Female" }],
			"Psychiatry": [{ name: "Dr. Ravi Kiran", gender: "Male" }, { name: "Dr. Tejaswini", gender: "Female" }]
			
        },
        "Nellore": {
            "Gynecology": [{ name: "Dr. Bharath Kumar", gender: "Male" }, { name: "Dr. Sriya Reddy", gender: "Female" }],
            "Pediatrics": [{ name: "Dr. Jyothish", gender: "Male" }, { name: "Dr. Yashmitha", gender: "Female" }],
			"Endocrinology": [{ name: "Dr. GunaSekar", gender: "Male" }, { name: "Dr. Pavani Naidu", gender: "Female" }],
			"General Physician": [{ name: "Anil Kumar", gender: "Male" }, { name: "Dr. Supraja Varma", gender: "Female" }],
			"Psychiatry": [{ name: "Dr. Srinivas", gender: "Male" }, { name: "Dr. Anshu Reddy", gender: "Female" }]
        },
        "Hyderabad": {
            "Gynecology": [{ name: "Dr. Rakesh", gender: "Male" }, { name: "Dr. Suguna", gender: "Female" }],
            "Pediatrics": [{ name: "Dr. Giri Babu", gender: "Male" }, { name: "Dr. Mohana", gender: "Female" }],
			"Endocrinology": [{ name: "Dr. Kamal", gender: "Male" }, { name: "Dr. Chithra", gender: "Female" }],
			"General Physician": [{ name: "Dr. Raja", gender: "Male" }, { name: "Dr. Vithya", gender: "Female" }],
			"Psychiatry": [{ name: "Dr. Subramanyam", gender: "Male" }, { name: "Dr. Sujatha", gender: "Female" }]
        },
		"Eluru": {
            "Gynecology": [{ name: "Dr. Chandra Mouli", gender: "Male" }, { name: "Dr. Sri Devi", gender: "Female" }],
            "Pediatrics": [{ name: "Dr. Shashank", gender: "Male" }, { name: "Dr. Rushitha", gender: "Female" }],
			"Endocrinology": [{ name: "Dr. Rishith Varma", gender: "Male" }, { name: "Dr. Srinidhi", gender: "Female" }],
			"General Physician": [{ name: "Dr. Bhargav", gender: "Male" }, { name: "Dr. Jyothirmayi", gender: "Female" }],
			"Psychiatry": [{ name: "Dr. Sai Abhinay", gender: "Male" }, { name: "Dr. Vyshnavi", gender: "Female" }]
        },
		"Visakhapatnam": {
            "Gynecology": [{ name: "Dr. Somesh", gender: "Male" }, { name: "Dr. Bhargavi", gender: "Female" }],
            "Pediatrics": [{ name: "Dr. Surya Prathap Nayak", gender: "Male" }, { name: "Dr. Esha", gender: "Female" }],
			"Endocrinology": [{ name: "Dr. Sravan Kumar", gender: "Male" }, { name: "Dr. Deepika", gender: "Female" }],
			"General Physician": [{ name: "Dr. Ram Nandhan", gender: "Male" }, { name: "Dr. Hema Priya", gender: "Female" }],
			"Psychiatry": [{ name: "Dr. Rithwik Varma", gender: "Male" }, { name: "Dr. Nithya Reddy", gender: "Female" }]
        }
    }
        let maleDoctorImg = "https://static.vecteezy.com/system/resources/previews/047/391/739/non_2x/male-doctor-clipart-png.png";
        let femaleDoctorImg = "https://static.vecteezy.com/system/resources/thumbnails/021/518/002/small/a-woman-doctor-with-a-tablet-and-a-stethoscope-an-image-on-a-blue-background-a-doctor-in-a-medical-uniform-cartoon-style-family-doctor-medical-worker-paramedic-vector.jpg";

        function selectCity() {
            let city = document.getElementById("city").value;
            if (city) {
                document.getElementById("hospitalName").innerText = hospitals[city].name;
                document.getElementById("hospitalImage").src = hospitals[city].img;
				document.getElementById("hospitalDetails").innerText=hospitals[city].hospitalDetails;
                document.getElementById("hospitalSection").style.display = "block";
            } else {
                document.getElementById("hospitalSection").style.display = "none";
            }
        }

        function selectHospital() {
            let specializationGrid = document.getElementById("specializationGrid");
            specializationGrid.innerHTML = "";
            specializations.forEach(spec => {
                let div = document.createElement("div");
                div.className = "card";
                div.innerHTML = '<img src="' + spec.img + '" alt="' + spec.name + '"><p>' + spec.name + '</p>';
                div.onclick = function() { selectSpecialization(spec.name); };
                specializationGrid.appendChild(div);
            });
            document.getElementById("specializationSection").style.display = "block";
        }
		function selectSpecialization(specName) {
    let doctorGrid = document.getElementById("doctorGrid");
    doctorGrid.innerHTML = "";

    let selectedCity = document.getElementById("city").value;

    if (selectedCity in doctors && specName in doctors[selectedCity]) {
        doctors[selectedCity][specName].forEach(doctor => {
            let div = document.createElement("div");
            div.className = "card";
            let doctorImg = doctor.gender === "Male" ? maleDoctorImg : femaleDoctorImg;
            div.innerHTML = '<img src="' + doctorImg + '" alt="Doctor"><p>' + doctor.name + ' (' + doctor.gender + ')</p>';
            doctorGrid.appendChild(div);
        });
    } else {
        doctorGrid.innerHTML = "<p>No doctors available for this specialization in this hospital.</p>";
    }

    document.getElementById("doctorSection").style.display = "block";
}
