<!-- 6. Photos -->
<div class="photos-section">
    <div class="form-section">
        <h4>6. Photos</h4>
        <div class="photo-grid">
            <!-- Front View -->
            <div class="photo-upload-section">
                <label for="frontView" class="form-label">Front View</label>
                <div id="frontViewPreview" class="picture-box picture-box-placeholder"></div>
                <input type="file" class="form-control" id="frontView" name="front_view" accept="image/*"
                    onchange="previewImage(this, 'frontViewPreview', false)" style="display: none;">
                <div class="button-group mt-2">
                    <button class="btn btn-primary btn-sm me-2"
                        onclick="document.getElementById('frontView').click()">Upload</button>
                    <button class="btn btn-secondary btn-sm"
                        onclick="removeImage('frontView', 'frontViewPreview')">Remove</button>
                </div>
                <div class="error-message text-danger" id="frontViewError"></div>
            </div>

            <!-- Rooms -->
            <div class="photo-upload-section">
                <label for="rooms" class="form-label">Rooms</label>
                <div id="roomsPreview" class="multi-picture-box-container"></div>
                <input type="file" class="form-control" id="rooms" name="rooms" accept="image/*" multiple
                    onchange="previewImage(this, 'roomsPreview', true)" style="display: none;">
                <div class="button-group mt-2">
                    <button class="btn btn-primary btn-sm me-2"
                        onclick="document.getElementById('rooms').click()">Upload</button>
                    <button class="btn btn-secondary btn-sm"
                        onclick="removeImage('rooms', 'roomsPreview')">Remove</button>
                </div>
                <div class="error-message text-danger" id="roomsError"></div>
            </div>

            <!-- Bathrooms -->
            <div class="photo-upload-section">
                <label for="bathrooms" class="form-label">Bathrooms</label>
                <div id="bathroomsPreview" class="multi-picture-box-container"></div>
                <input type="file" class="form-control" id="bathrooms" name="bathrooms" accept="image/*"
                    multiple onchange="previewImage(this, 'bathroomsPreview', true)" style="display: none;">
                <div class="button-group mt-2">
                    <button class="btn btn-primary btn-sm me-2"
                        onclick="document.getElementById('bathrooms').click()">Upload</button>
                    <button class="btn btn-secondary btn-sm"
                        onclick="removeImage('bathrooms', 'bathroomsPreview')">Remove</button>
                </div>
                <div class="error-message text-danger" id="bathroomsError"></div>
            </div>

            <!-- Common Areas -->
            <div class="photo-upload-section">
                <label for="commonAreas" class="form-label">Common Areas</label>
                <div id="commonAreasPreview" class="multi-picture-box-container"></div>
                <input type="file" class="form-control" id="commonAreas" name="common_areas"
                    accept="image/*" multiple onchange="previewImage(this, 'commonAreasPreview', true)"
                    style="display: none;">
                <div class="button-group mt-2">
                    <button class="btn btn-primary btn-sm me-2"
                        onclick="document.getElementById('commonAreas').click()">Upload</button>
                    <button class="btn btn-secondary btn-sm"
                        onclick="removeImage('commonAreas', 'commonAreasPreview')">Remove</button>
                </div>
                <div class="error-message text-danger" id="commonAreasError"></div>
            </div>

            <!-- Dining Area -->
            <div class="photo-upload-section">
                <label for="diningArea" class="form-label">Dining Area</label>
                <div id="diningAreaPreview" class="multi-picture-box-container"></div>
                <input type="file" class="form-control" id="diningArea" name="dining_area" accept="image/*"
                    multiple onchange="previewImage(this, 'diningAreaPreview', true)"
                    style="display: none;">
                <div class="button-group mt-2">
                    <button class="btn btn-primary btn-sm me-2"
                        onclick="document.getElementById('diningArea').click()">Upload</button>
                    <button class="btn btn-secondary btn-sm"
                        onclick="removeImage('diningArea', 'diningAreaPreview')">Remove</button>
                </div>
                <div class="error-message text-danger" id="diningAreaError"></div>
            </div>

            <!-- Exterior/Interior -->
            <div class="photo-upload-section">
                <label for="exteriorInterior" class="form-label">Building Exterior/Interior</label>
                <div id="exteriorInteriorPreview" class="multi-picture-box-container"></div>
                <input type="file" class="form-control" id="exteriorInterior" name="exterior_interior"
                    accept="image/*" multiple onchange="previewImage(this, 'exteriorInteriorPreview', true)"
                    style="display: none;">
                <div class="button-group mt-2">
                    <button class="btn btn-primary btn-sm me-2"
                        onclick="document.getElementById('exteriorInterior').click()">Upload</button>
                    <button class="btn btn-secondary btn-sm"
                        onclick="removeImage('exteriorInterior', 'exteriorInteriorPreview')">Remove</button>
                </div>
                <div class="error-message text-danger" id="exteriorInteriorError"></div>
            </div>
        </div>
        <div class="action-buttons mt-3">
            <button class="btn btn-primary" onclick="validateAndSavePhotosSection('photos-section')"><i
                    class="bi bi-save me-1"></i> Save Changes</button>
            <button class="btn btn-secondary" onclick="clearSection('photos-section')"><i
                    class="bi bi-x-circle me-1"></i> Clear</button>
        </div>
    </div>
    <div class="navigation-container">
        <div class="nav-buttons">
            <button class="btn btn-secondary" onclick="navigateWithModal('06-facilities-section')"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
            <button class="btn btn-primary" onclick="navigateWithModal('08-booking-info-section')"><i
                    class="bi bi-arrow-right me-1"></i> Next</button>
        </div>
    </div>
</div>

<script>
    function previewImage(input, previewId, isMultiple) {
        const preview = document.getElementById(previewId);
        preview.innerHTML = ''; // Clear existing preview

        if (input.files && input.files.length > 0) {
            preview.classList.remove('picture-box-placeholder');
            if (isMultiple) {
                Array.from(input.files).forEach(file => {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.style.maxWidth = '100px';
                    img.style.margin = '5px';
                    preview.appendChild(img);
                });
            } else {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(input.files[0]);
                img.style.maxWidth = '100%';
                img.style.maxHeight = '150px';
                preview.appendChild(img);
            }
        } else {
            preview.classList.add('picture-box-placeholder');
        }
    }

    function removeImage(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        input.value = ''; // Clear the file input
        preview.innerHTML = ''; // Clear the preview
        preview.classList.add('picture-box-placeholder');
        // Clear any associated error message
        const errorElement = document.getElementById(`${inputId}Error`);
        if (errorElement) errorElement.textContent = '';
    }

    function validateAndSavePhotosSection(sectionId) {
        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        // Get form elements
        const frontView = document.getElementById('frontView');
        const rooms = document.getElementById('rooms');
        const bathrooms = document.getElementById('bathrooms');
        const commonAreas = document.getElementById('commonAreas');
        const diningArea = document.getElementById('diningArea');
        const exteriorInterior = document.getElementById('exteriorInterior');

        let isValid = true; // Validation flag

        // Validate Front View (required)
        if (!frontView.files || frontView.files.length === 0) {
            document.getElementById('frontViewError').textContent = "At least one Front View image is required";
            isValid = false;
        } else if (!frontView.files[0].type.startsWith('image/')) {
            document.getElementById('frontViewError').textContent = "Only image files are allowed for Front View";
            isValid = false;
        }

        // Validate optional sections (if files are selected, ensure they are images)
        const optionalInputs = [{
                input: rooms,
                id: 'rooms',
                label: 'Rooms'
            },
            {
                input: bathrooms,
                id: 'bathrooms',
                label: 'Bathrooms'
            },
            {
                input: commonAreas,
                id: 'commonAreas',
                label: 'Common Areas'
            },
            {
                input: diningArea,
                id: 'diningArea',
                label: 'Dining Area'
            },
            {
                input: exteriorInterior,
                id: 'exteriorInterior',
                label: 'Building Exterior/Interior'
            }
        ];

        optionalInputs.forEach(({
            input,
            id,
            label
        }) => {
            if (input.files && input.files.length > 0) {
                Array.from(input.files).forEach(file => {
                    if (!file.type.startsWith('image/')) {
                        document.getElementById(`${id}Error`).textContent = `Only image files are allowed for ${label}`;
                        isValid = false;
                    }
                });
            }
        });

        // Proceed with save if all validations pass
        if (isValid) {
            saveSection(sectionId);
        }
    }

    function saveSection() {
        const formData = new FormData();

        // Single image
        const frontView = document.getElementById('frontView');
        if (frontView.files.length > 0) {
            formData.append('front_view', frontView.files[0]);
        }

        // Multiple images
        const rooms = document.getElementById('rooms');
        for (let i = 0; i < rooms.files.length; i++) {
            formData.append('rooms[]', rooms.files[i]);
        }
        const bathrooms = document.getElementById('bathrooms');
        for (let i = 0; i < bathrooms.files.length; i++) {
            formData.append('bathrooms[]', bathrooms.files[i]);
        }
        const commonAreas = document.getElementById('commonAreas');
        for (let i = 0; i < commonAreas.files.length; i++) {
            formData.append('common_areas[]', commonAreas.files[i]);
        }
        const diningArea = document.getElementById('diningArea');
        for (let i = 0; i < diningArea.files.length; i++) {
            formData.append('dining_area[]', diningArea.files[i]);
        }
        const exteriorInterior = document.getElementById('exteriorInterior');
        for (let i = 0; i < exteriorInterior.files.length; i++) {
            formData.append('exterior_interior[]', exteriorInterior.files[i]);
        }

        fetch('../includes/save_photos.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Photos saved!');
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            alert('Network or server error: ' + error);
        });
    }
</script>