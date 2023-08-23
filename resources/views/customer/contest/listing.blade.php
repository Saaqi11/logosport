@extends("layouts.competition-main")
@section("content")
    <div class="container">
        <div class="row row-cols-2" style="margin-top: -70px">
            <div class="col">
                <h1>
                    Contests
                </h1>
            </div>
            <div class="col buton">
                <button>
                    <p>Add contest</p>
                </button>
            </div>
        </div>
        <div class="filter">
			<span>
				Filter
			</span>
            <ul>
                <li><a ><i class="fas fa-star"></i>Favourites</a></li>
            </ul>
        </div>
        <div class="fltr-item">
            <div class="row row-cols-2">
                <div class="col">
                    <label for="sort-by">Level Of Contest</label>
                    <select name="business_level" id="business-level">
                        <option value="" selected>Select Any Option</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Big">Big</option>
                    </select>
                </div>
                <div class="col default">
                    <label for="sort-by">Sort By Participants</label>
                    <select name="sort_by_participants" id="sort-by-participants">
                        <option value="" selected hidden>Select Any Option</option>
                        <option value="5">Less than 5</option>
                        <option value="10">Less than 10</option>
                        <option value="20">Less than 20 </option>
                    </select>
                </div>
            </div>
            <div class="row fltr-down">
                <div class="col price-range">
                    <label for="contest-filter-price" id="contest-filter-price-value">Contest price greater than (200$):</label>
                    <input id="contest-filter-price" type="range" value="200" min="10" max="1800">
                </div>
                <div class="col dubble-btn">
                    <p>
                        <br>
                    </p>
                    <button class="status-filter active-status open" data-id="2">
                        Open
                    </button>
                    <button class="status-filter finish" data-id="4">
                        Finish
                    </button>
                </div>
            </div>
        </div>
        <div class="cnt" >
            <table id="contest-container">
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection