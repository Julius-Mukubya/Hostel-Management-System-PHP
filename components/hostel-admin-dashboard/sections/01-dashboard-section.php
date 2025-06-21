 <!--1. Dashboard Section -->
<div class="01-dashboard-section container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>CMS Dashboard</h2>
        <div>
            <label class="form-label mb-2">Select Hostel:</label>
            <select class="form-control d-inline-block w-auto">
                <option>Hostel One</option>
                <option>Hostel Two</option>
                <option>Hostel Three</option>
            </select>
        </div>
    </div>

    <!-- Hostel Management Sub-Section -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Hostel Listings</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hostel One</td>
                        <td>Kampala</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i>
                                Edit</button>
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i>
                                Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Ratings & Stats Sub-Section -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h6 class="card-title">Average Rating</h6>
                    <p class="fs-5 mb-0">4.3 <i class="bi bi-star-fill text-warning"></i></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h6 class="card-title">Total Reviews</h6>
                    <p class="fs-5 mb-0">124</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h6 class="card-title">Total Inquiries</h6>
                    <p class="fs-5 mb-0">57</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews Table Sub-Section-->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Recent Reviews</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jane Doe</td>
                        <td>5 <i class="bi bi-star-fill text-warning"></i></td>
                        <td>Great location and clean rooms!</td>
                        <td>2025-05-28</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Inquiries Table Sub-Section-->
    <div class="card mb-5">
        <div class="card-header">
            <h5>Recent Inquiries</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Smith</td>
                        <td>+256700000000</td>
                        <td>Is there a shared room available?</td>
                        <td>2025-05-30</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="navigation-container">
        <div class="nav-buttons" style="justify-self: end;">
            <button class="btn btn-primary navigation-btn" onclick="navigateWithModal(`02-basic-info-section`)"><i
                    class="bi bi-arrow-right me-1"></i> Next</button>
        </div>
    </div>
</div>   
