<!--2. Basic Details Section -->
<div class="basic-info-section">
    <div class="form-section">
        <h4>1. Basic Details</h4>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Hostel Name</label>
                <input type="text" class="form-control" id="hostelName">
                <div class="error-message text-danger" id="hostelNameError"></div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Type of Hostel</label>
                <select class="form-select" id="hostelType">
                    <option value="" selected disabled>--Select Hostel Type --</option>
                    <option value="Mixed">Mixed</option>
                    <option value="Boys">Boys</option>
                    <option value="Girls">Girls</option>
                </select>
                <div class="error-message text-danger" id="hostelTypeError"></div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Owner Name</label>
                <input type="text" class="form-control" id="ownerName">
                <div class="error-message text-danger" id="ownerNameError"></div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contactNumber">
                <div class="error-message text-danger" id="contactNumberError"></div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" id="emailAddress">
                <div class="error-message text-danger" id="emailAddressError"></div>
            </div>
        </div>
        <div class="action-buttons mt-3">
            <button class="btn btn-primary" onclick="validateAndSaveBasicInfoSection(`basic-info-section`)"><i
                    class="bi bi-save me-1"></i> Save Changes</button>
            <button class="btn btn-secondary" onclick="clearSection(`basic-info-section`)"><i
                    class="bi bi-x-circle me-1"></i> Clear</button>
        </div>
    </div>
    <div class="navigation-container">
        <div class="nav-buttons">
            <button class="btn btn-secondary" onclick="navigateWithModal(`01-dashboard-section`)"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
            <button class="btn btn-primary" onclick="navigateWithModal('03-location-section')"><i
                    class="bi bi-arrow-right me-1"></i> Next</button>
        </div>
    </div>
</div>

<script>
    function validateAndSaveBasicInfoSection(sectionId) {
        // Clear previous error messages
        const section = document.querySelector(".basic-info-section")
        section.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        // Get form elements
        const hostelName = document.getElementById('hostelName').value.trim();
        const hostelType = document.getElementById('hostelType').value;
        const ownerName = document.getElementById('ownerName').value.trim();
        const contactNumber = document.getElementById('contactNumber').value.trim();
        const emailAddress = document.getElementById('emailAddress').value.trim();

        // Validation patterns
        const phonePattern = /^\+?[\d\s-]{10,}$/;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Track validation status
        let isValid = true;

        // Validation checks
        if (!hostelName) {
            document.getElementById('hostelNameError').textContent = "Hostel Name is required";
            isValid = false;
        }

        if (hostelType === "") {
            document.getElementById('hostelTypeError').textContent = "Please select a Hostel Type";
            isValid = false;
        }

        if (!ownerName) {
            document.getElementById('ownerNameError').textContent = "Owner Name is required";
            isValid = false;
        }

        if (!contactNumber) {
            document.getElementById('contactNumberError').textContent = "Contact Number is required";
            isValid = false;
        } else if (!phonePattern.test(contactNumber)) {
            document.getElementById('contactNumberError').textContent = "Please enter a valid phone number";
            isValid = false;
        }

        if (!emailAddress) {
            document.getElementById('emailAddressError').textContent = "Email Address is required";
            isValid = false;
        } else if (!emailPattern.test(emailAddress)) {
            document.getElementById('emailAddressError').textContent = "Please enter a valid email address";
            isValid = false;
        }

        // Proceed with save if all validations pass
        if (isValid) {
            saveSection(sectionId);
        }
    }


    //fucntion to save data to the database
    function saveSection() {
        // Collect values from form fields
        const hostelName = document.getElementById('hostelName').value.trim();
        const hostelType = document.getElementById('hostelType').value;
        const ownerName = document.getElementById('ownerName').value.trim();
        const contactNumber = document.getElementById('contactNumber').value.trim();
        const emailAddress = document.getElementById('emailAddress').value.trim();

        // Sending data to PHP while using fetch
        fetch('save_basic_info.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    hostelName,
                    hostelType,
                    ownerName,
                    contactNumber,
                    emailAddress
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Saved successfully!');
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                alert('Network or server error: ' + error);
            });
    }
</script>