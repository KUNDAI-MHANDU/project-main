// Get the image element
const image = document.getElementById('image');

// Add an event listener to restart the animation when it ends
image.addEventListener('animationend', () => {
  image.style.animation = 'none';
  void image.offsetWidth; // Trigger a reflow to reset the animation
  image.style.animation = 'bounce 5s infinite'; // Adjust the animation duration as desired
});

// Attach event listener to user-type select element
const userTypeSelect = document.getElementById('user-type');
const citizenSelect = document.getElementById('m-citizen');
const M_cellnumber = document.getElementById('m_number');
const s_citizen = document.getElementById('s_citizen');
const s_cellnumber = document.getElementById('s_cellnumber');
userTypeSelect.addEventListener('change', showForm);
citizenSelect.addEventListener('change', showForm);
M_cellnumber.addEventListener('change', showForm);
s_citizen.addEventListener('change', showForm);
s_cellnumber.addEventListener('change', showForm);


// Function to show the relevant form based on the selected user type
function showForm() {
  const studentForm = document.getElementById('student-form');
  const managerForm = document.getElementById('manager-form');
  const idNumberDiv = document.getElementById('idNumber');
  const passportDiv = document.getElementById('passport');
  const M_saNumber = document.getElementById('saNumber');
  const M_number = document.getElementById('number');
  const s_idNumber = document.getElementById('s_idNumber');
  const s_passport= document.getElementById('s_passport');
  const s_saNumber = document.getElementById('s_saNumber');
  const s_number = document.getElementById('s_number');

  if (userTypeSelect.value === 'student') {
    studentForm.style.display = 'block';
    managerForm.style.display = 'none';
    if (s_citizen.value === 'Yes') {
        s_idNumber.style.display = 'block';
        s_passport.style.display = 'none';
      } else if (s_citizen.value === 'No') {
        s_idNumber.style.display = 'none';
        s_passport.style.display = 'block';
      } else {
        s_idNumber.style.display = 'none';
        s_passport.style.display = 'none';
      }


        if (s_cellnumber.value === 'Yes') {
        s_saNumber.style.display = 'block';
        s_number.style.display = 'none';
        } else if (s_cellnumber.value === 'No') {
        s_saNumber.style.display = 'none';
        s_number.style.display = 'block';
        } else {
        s_number.style.display = 'none';
        s_saNumber.style.display = 'none';
        }
  } if (userTypeSelect.value === 'manager') {
    studentForm.style.display = 'none';
    managerForm.style.display = 'block';
    if (citizenSelect.value === 'Yes') {
        idNumberDiv.style.display = 'block';
        passportDiv.style.display = 'none';
      } else if (citizenSelect.value === 'No') {
        idNumberDiv.style.display = 'none';
        passportDiv.style.display = 'block';
      } else {
        idNumberDiv.style.display = 'none';
        passportDiv.style.display = 'none';
      }


        if (M_cellnumber.value === 'Yes') {
        M_saNumber.style.display = 'block';
        M_number.style.display = 'none';
        } else if (M_cellnumber.value === 'No') {
        M_saNumber.style.display = 'none';
        M_number.style.display = 'block';
        } else {
        M_number.style.display = 'none';
        M_saNumber.style.display = 'none';
        }
  } 
}