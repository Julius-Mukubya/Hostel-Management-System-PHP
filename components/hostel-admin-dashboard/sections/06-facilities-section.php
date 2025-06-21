<!-- 5. Facilities & Amenities -->
  <div class="facilities-section">
      <div class="form-section">
          <h4>5. Facilities & Amenities</h4>
          <div class="row row-cols-2 row-cols-md-3 g-2">
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Wi-Fi" id="wifi">
                  <label class="form-check-label" for="wifi">Wi-Fi</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Electricity Backup / Generator"
                      id="electricity">
                  <label class="form-check-label" for="electricity">Electricity Backup / Generator</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Laundry Services" id="laundry">
                  <label class="form-check-label" for="laundry">Laundry Services</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Meals" id="meals">
                  <label class="form-check-label" for="meals">Meals (Breakfast/Lunch/Dinner)</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Attached Bathroom" id="bathroom">
                  <label class="form-check-label" for="bathroom">Attached Bathroom</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Common Area" id="commonArea">
                  <label class="form-check-label" for="commonArea">Common Area</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Study Room / Library" id="library">
                  <label class="form-check-label" for="library">Study Room / Library</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Gym / Fitness Room" id="gym">
                  <label class="form-check-label" for="gym">Gym / Fitness Room</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Water Purifier" id="purifier">
                  <label class="form-check-label" for="purifier">Water Purifier</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Housekeeping / Cleaning"
                      id="housekeeping">
                  <label class="form-check-label" for="housekeeping">Housekeeping / Cleaning</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Parking" id="parking">
                  <label class="form-check-label" for="parking">Parking</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Elevator" id="elevator">
                  <label class="form-check-label" for="elevator">Elevator</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Balcony" id="balcony">
                  <label class="form-check-label" for="balcony">Balcony</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="TV" id="tv">
                  <label class="form-check-label" for="tv">TV</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Air Conditioning" id="ac">
                  <label class="form-check-label" for="ac">Air Conditioning</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="CCTV Surveillance" id="cctv">
                  <label class="form-check-label" for="cctv">CCTV Surveillance</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="Biometric Entry" id="biometric">
                  <label class="form-check-label" for="biometric">Biometric Entry</label>
              </div>
              <div class="form-check col">
                  <input class="form-check-input" type="checkbox" value="24/7 Security" id="security">
                  <label class="form-check-label" for="security">24/7 Security</label>
              </div>
          </div>
          <div class="error-message text-danger" id="facilitiesError"></div>
          <div class="action-buttons mt-3">
              <button class="btn btn-primary" onclick="validateAndSaveFacilitiesSection('facilities-section')"><i
                      class="bi bi-save me-1"></i> Save Changes</button>
              <button class="btn btn-secondary" onclick="clearSection('facilities-section')"><i
                      class="bi bi-x-circle me-1"></i> Clear</button>
          </div>
      </div>
      <div class="navigation-container">
          <div class="nav-buttons">
              <button class="btn btn-secondary" onclick="navigateWithModal('05-rooms-section')"><i
                      class="bi bi-arrow-left me-1"></i> Previous</button>
              <button class="btn btn-primary" onclick="navigateWithModal('07-photos-section')"><i
                      class="bi bi-arrow-right me-1"></i> Next</button>
          </div>
      </div>
  </div>

  <script>
      function validateAndSaveFacilitiesSection(sectionId) {
          // Clear previous error messages
          document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

          // Get form elements
          const checkboxes = document.querySelectorAll('.facilities-section .form-check-input');
          const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;

          // Track validation status
          let isValid = true;

          // Validation checks
          if (checkedCount === 0) {
              document.getElementById('facilitiesError').textContent = "At least one facility must be selected";
              isValid = false;
          }

          // Proceed with save if all validations pass
          if (isValid) {
              saveSection(sectionId);
          }
      }

      function saveSection() {
          // Collect all checked facilities
          const checkboxes = document.querySelectorAll('.facilities-section .form-check-input');
          const facilities = Array.from(checkboxes)
              .filter(cb => cb.checked)
              .map(cb => cb.value);

          // Send data to PHP using fetch
          fetch('save_facilities.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ facilities })
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  alert('Facilities saved!');
              } else {
                  alert('Error: ' + data.message);
              }
          })
          .catch(error => {
              alert('Network or server error: ' + error);
          });
      }
  </script>