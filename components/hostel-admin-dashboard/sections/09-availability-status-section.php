<!-- 8. Availability Status -->
  <div class="availability-section">
      <div class="form-section">
          <h4>8. Availability Status</h4>
          <div class="row g-3">
              <div class="col-md-6">
                  <label class="form-label">Currently Accepting bookings?</label>
                  <select class="form-select" id="acceptingbookings">
                      <option value="" selected disabled>Select an option</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                  </select>
                  <div class="error-message text-danger" id="acceptingbookingsError"></div>
              </div>
              <div class="col-md-6">
                  <label class="form-label">Available From</label>
                  <input type="date" class="form-control" id="availableFrom">
                  <div class="error-message text-danger" id="availableFromError"></div>
              </div>
          </div>
          <div class="action-buttons mt-3">
              <button class="btn btn-primary" onclick="validateAndSaveAvailabilityStatusSection('availability-section')"><i
                      class="bi bi-save me-1"></i> Save Changes</button>
              <button class="btn btn-secondary" onclick="clearSection('availability-section')"><i
                      class="bi bi-x-circle me-1"></i> Clear</button>
          </div>
      </div>
      <div class="navigation-container">
          <div class="nav-buttons">
              <button class="btn btn-secondary" onclick="navigateWithModal('08-booking-info-section')"><i
                      class="bi bi-arrow-left me-1"></i> Previous</button>
              <button class="btn btn-primary" onclick="navigateWithModal('01-dashboard-section')"><i class="bi bi-arrow-right me-1"></i> Dashboard</button>
          </div>
      </div>
  </div>

  <script>
      function validateAndSaveAvailabilityStatusSection(sectionId) {
          // Clear previous error messages
          document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

          // Get form elements
          const acceptingbookings = document.getElementById('acceptingbookings').value;
          const availableFrom = document.getElementById('availableFrom').value;

          // Current date for comparison (June 06, 2025)
          const today = new Date('2025-06-06');
          today.setHours(0, 0, 0, 0); // Normalize to start of day


          // Track validation status
          let isValid = true;

          // Validation checks

          // Validate Currently Accepting bookings
          if (!acceptingbookings) {
              document.getElementById('acceptingbookingsError').textContent = "Please select an option for accepting bookings";
              isValid = false;
          }

          // Validate Available From
          if (!availableFrom) {
              document.getElementById('availableFromError').textContent = "Available From date is required";
              isValid = false;
          } else {
              const selectedDate = new Date(availableFrom);
              if (selectedDate < today) {
                  document.getElementById('availableFromError').textContent = "Available From date cannot be in the past";
                  isValid = false;
              }
          }

          // Proceed with save if all validations pass
          if (isValid) {
              saveSection(sectionId);
          }
      }

      function saveSection() {
          // Collect values from form fields
          const acceptingbookings = document.getElementById('acceptingbookings').value;
          const availableFrom = document.getElementById('availableFrom').value;

          // Send data to PHP using fetch
          fetch('../includes/save_availability.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({
                  acceptingbookings,
                  availableFrom
              })
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  alert('Availability status saved!');
              } else {
                  alert('Error: ' + data.message);
              }
          })
          .catch(error => {
              alert('Network or server error: ' + error);
          });
      }
  </script>