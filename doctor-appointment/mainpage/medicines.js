document.getElementById("prescriptionForm").addEventListener("submit", function(event) {
    event.preventDefault(); 
    let appointmentID = document.getElementById("appointmentID").value;
    let patientName = document.getElementById("patientName").value;
    let doctorName = document.getElementById("doctorName").value;
    let appointmentDate = document.getElementById("appointmentDate").value;
    if (!/^\d{1,5}$/.test(appointmentID)) {
        alert("Invalid appointment id entered, enter a valid digit of max 5 digits for appointment ID");
        return;
    }
    if(!/^[A-Za-z\s.]+$/.test(patientName)){
        alert("Incorrect Patient name entered. Name can have only letters, spaces and dots ('.')");
        return;
    }
    if(!/^[A-Za-z\s.]+$/.test(doctorName)){
        alert("Incorrect Doctor name entered. Name can have only letters, spaces and dots ('.')");
        return;
    }
    window.location.href = `prescription.php?appointmentID=${appointmentID}&appointmentDate=${appointmentDate}`;
});

