<!-- 3. Hostel Description -->
 <div class="description-section">
     <div class="form-section">
         <h4>3. Hostel Description</h4>
         <div class="mb-3">
             <label class="form-label">Overview / Introduction</label>
             <textarea class="form-control" id="overview" rows="3"></textarea>
             <div class="error-message text-danger" id="overviewError"></div>
         </div>
         <div class="mb-3">
             <label class="form-label">Hostel Rules</label>
             <textarea class="form-control" id="hostelRules" rows="2"></textarea>
             <div class="error-message text-danger" id="hostelRulesError"></div>
         </div>
         <div class="row g-3">
             <div class="col-md-6">
                 <label class="form-label">Check-in Time</label>
                 <input type="time" class="form-control" id="checkInTime">
                 <div class="error-message text-danger" id="checkInTimeError"></div>
             </div>
             <div class="col-md-6">
                 <label class="form-label">Check-out Time</label>
                 <input type="time" class="form-control" id="checkOutTime">
                 <div class="error-message text-danger" id="checkOutTimeError"></div>
             </div>
             <div class="col-md-12">
                 <label class="form-label">Security Features</label>
                 <input type="text" class="form-control" id="securityFeatures">
                 <div class="error-message text-danger" id="securityFeaturesError"></div>
             </div>
         </div>

         <div class="action-buttons mt-3">
             <button class="btn btn-primary" onclick="validateAndSaveDescriptionSection(`description-section`)"><i
                     class="bi bi-save me-1"></i> Save Changes</button>
             <button class="btn btn-secondary" onclick="clearSection(`description-section`)"><i
                     class="bi bi-x-circle me-1"></i> Clear</button>
         </div>
     </div>

     <div class="navigation-container">
         <div class="nav-buttons">
             <button class="btn btn-secondary" onclick="navigateWithModal(`03-location-section`)"><i
                     class="bi bi-arrow-left me-1"></i> Previous</button>
             <button class="btn btn-primary" onclick="navigateWithModal(`05-rooms-section`)"><i
                     class="bi bi-arrow-right me-1"></i> Next</button>
         </div>
     </div>
 </div>

 <script>
     function validateAndSaveDescriptionSection(sectionId) {
         // Clear previous error messages
         document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

         // Get form elements
         const overview = document.getElementById('overview').value.trim();
         const hostelRules = document.getElementById('hostelRules').value.trim();
         const checkInTime = document.getElementById('checkInTime').value;
         const checkOutTime = document.getElementById('checkOutTime').value;
         const securityFeatures = document.getElementById('securityFeatures').value.trim();


         // Track validation status
         let isValid = true;

         // Validation checks
         if (!overview) {
             document.getElementById('overviewError').textContent = "Overview is required";
             isValid = false;
         } else if (overview.length < 10) {
             document.getElementById('overviewError').textContent = "Overview must be at least 10 characters";
             isValid = false;
         }

         if (!hostelRules) {
             document.getElementById('hostelRulesError').textContent = "Hostel Rules are required";
             isValid = false;
         } else if (hostelRules.length < 10) {
             document.getElementById('hostelRulesError').textContent = "Hostel Rules must be at least 10 characters";
             isValid = false;
         }

         if (!checkInTime) {
             document.getElementById('checkInTimeError').textContent = "Check-in Time is required";
             isValid = false;
         }

         if (!checkOutTime) {
             document.getElementById('checkOutTimeError').textContent = "Check-out Time is required";
             isValid = false;
         }

         if (!securityFeatures) {
             document.getElementById('securityFeaturesError').textContent = "Security Features are required";
             isValid = false;
         } else if (securityFeatures.length < 5) {
             document.getElementById('securityFeaturesError').textContent = "Security Features must be at least 5 characters";
             isValid = false;
         }

         // Proceed with save if all validations pass
         if (isValid) {
             saveSection(sectionId);
         }
     }

     // Function to send description data to the PHP script using fetch
     function saveSection() {
         // Collect values from form fields
         const overview = document.getElementById('overview').value.trim();
         const hostelRules = document.getElementById('hostelRules').value.trim();
         const checkInTime = document.getElementById('checkInTime').value;
         const checkOutTime = document.getElementById('checkOutTime').value;
         const securityFeatures = document.getElementById('securityFeatures').value.trim();

         // Send data to PHP using fetch
         fetch('../includes/save_description.php', {
             method: 'POST',
             headers: { 'Content-Type': 'application/json' },
             body: JSON.stringify({
                 overview,
                 hostelRules,
                 checkInTime,
                 checkOutTime,
                 securityFeatures
             })
         })
         .then(response => response.json())
         .then(data => {
             if (data.success) {
                 alert('Description saved!');
             } else {
                 alert('Error: ' + data.message);
             }
         })
         .catch(error => {
             alert('Network or server error: ' + error);
         });
     }
 </script>