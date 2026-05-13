<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ADGIPS Facility Central</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="index.css" />
</head>
<body>
  <!-- <?php
include 'db.php';

// Total complaints
$totalQuery = $conn->query("SELECT COUNT(*) as total FROM complaints");
$total = $totalQuery->fetch_assoc()['total'];

// New complaints (last 5 minutes)
$newQuery = $conn->query("SELECT COUNT(*) as new FROM complaints 
                         WHERE created_at >= NOW() - INTERVAL 5 MINUTE");
$new = $newQuery->fetch_assoc()['new'];

// Assigned complaints
$assignedQuery = $conn->query("SELECT COUNT(*) as assigned FROM complaints 
                              WHERE status='Assigned'");
$assigned = $assignedQuery->fetch_assoc()['assigned'];
?> -->
  <div class="app">
    <aside class="sidebar">
      <div class="brand">
        <div class="brand-icon">AD</div>
        <div>
          <div class="brand-name">ADGIPS</div>
          <div class="brand-subtitle">Facility Central</div>
        </div>
      </div>
          <nav class="space-y-3 text-slate-700">
            <a href="index.php" class="block rounded-2xl px-4 py-3 bg-slate-100 text-blue-700 font-semibold">Dashboard</a>
            <a href="mycomplaints.php" class="block rounded-2xl px-4 py-3 hover:bg-slate-100">My Complaints</a>
            <a href="filecomplaint.html" class="block rounded-2xl px-4 py-3 hover:bg-slate-100">File Complaint</a>
            <a href="assessmentmanagement.html" class="block rounded-2xl px-4 py-3 hover:bg-slate-100">Asset Management</a>
            <a href="aiassistant.html" class="block rounded-2xl px-4 py-3 hover:bg-slate-100">AI Assistant</a>
          </nav>

      <div class="performance-card">
        <strong>AI PERFORMANCE</strong>
        <p>AI accurately categorized 94% of issues last month. Resource allocation optimized by 12%.</p>
        <div class="profile">
          <div class="profile-info">
            <div class="avatar">AS</div>
            <div class="profile-text">
              <strong>Ayush.</strong>
              <span>Admin Access</span>
            </div>
          </div>
          <div>→</div>
        </div>
      </div>
    </aside>

    <main class="main">
      <section class="topbar">
        <div class="heading-group">
          <h1>ADGIPS Facility Central</h1>
          <p>Monitoring 15 rooms · Block A-C</p>
        </div>
        <div class="top-actions">
          <label class="search">
            <span class="search-icon">🔍</span>
            <input type="search" placeholder="Search rooms, assets..." aria-label="Search rooms, assets" />
          </label>
          <div class="user-badge">AD</div>
        </div>
      </section>

      <section class="grid-cards">
       <article class="metric-card">
         <span>Live Complaints</span>
         <div style="display:flex; align-items:center; gap:10px;">
           <h2><?php echo $total; ?></h2>
           <span class="badge red">+<?php echo $new; ?> New</span>
         </div>
       </article>

       <!-- In Progress -->
        <article class="metric-card">
          <span>In Progress</span>
          <div style="display:flex; align-items:center; gap:10px;">
            <h2><?php echo $assigned; ?></h2>
            <span class="badge yellow">Assigned</span>
          </div>
        </article>

        <article class="metric-card">
          <span>Room Occupancy</span>
          <div style="display:flex; align-items:center; gap:10px; justify-content: space-between;">
            <h2>98%</h2>
            <span class="badge yellow">Stable</span>
          </div>
        </article>
      </section>

      <section class="dashboard-body">
        <div class="panel">
          <div class="panel-header">
            <div class="panel-title">Maintenance Task Frequency</div>
            <span class="pill">Live Data</span>
          </div>
          <div class="chart">
            <div class="grid-lines">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
            </div>
            <div class="line-plot">
              <svg viewBox="0 0 900 320" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M60 240 C 140 200 180 160 260 170 C 340 180 420 90 520 80 C 600 90 680 140 760 210 C 840 250 900 260 900 260"
                      stroke="#2563eb" stroke-width="8" fill="none" stroke-linecap="round" />
                <path d="M60 240 C 140 200 180 160 260 170 C 340 180 420 90 520 80 C 600 90 680 140 760 210 C 840 250 900 260 900 260"
                      stroke="rgba(37,99,235,0.15)" stroke-width="18" fill="none" stroke-linecap="round" />
              </svg>
            </div>
          </div>
          <div class="x-axis">
            <span>Mon</span>
            <span>Tue</span>
            <span>Wed</span>
            <span>Thu</span>
            <span>Fri</span>
            <span>Sat</span>
            <span>Sun</span>
          </div>
        </div>

        <div class="panel">
          <div class="panel-header">
            <div class="panel-title">Block Occupancy</div>
          </div>
          <div class="occupancy-grid">
            <div class="occupancy-cell">A1</div>
            <div class="occupancy-cell">A2</div>
            <div class="occupancy-cell cell-warning">A3</div>
            <div class="occupancy-cell">A4</div>
            <div class="occupancy-cell">A5</div>
            <div class="occupancy-cell">B1</div>
            <div class="occupancy-cell cell-issue" >B2</div>
            <div class="occupancy-cell">B3</div>
            <div class="occupancy-cell">B4</div>
            <div class="occupancy-cell">B5</div>
            <div class="occupancy-cell">C1</div>
            <div class="occupancy-cell">C2</div>
            <div class="occupancy-cell">C3</div>
            <div class="occupancy-cell">C4</div>
            <div class="occupancy-cell">C5</div>
          </div>
          <div class="legend">
            <span><span class="legend-dot" style="background:#93c5fd"></span>Occupied</span>
            <span><span class="legend-dot" style="background:#fca5a5"></span>Issue</span>
          </div>

          <div class="assistant-card">
            <div class="assistant-inner">
              <div>
                <div class="assistant-title">AI Assistant</div>
                <p class="assistant-text">"AI analyzed feedback for Block D. Recommendation: Inspect HVAC filters before summer peak."</p>
              </div>
              <a href="#" class="assistant-button">Acknowledge Insight</a>
            </div>
            <div class="assistant-floating">💬</div>
          </div>
        </div>
      </section>
    </main>
  </div>

  <script>
    const navLinks = document.querySelectorAll('.nav a');
    const assistantButton = document.querySelector('.assistant-button');
    const floatingAssistant = document.querySelector('.assistant-floating');

    function setActiveNav() {
      const currentPage = window.location.pathname.split('/').pop() || 'index.html';
      navLinks.forEach(link => {
        const linkHref = link.getAttribute('href');
        if (linkHref === currentPage) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      });
    }

    function navigateToAssistant(event) {
      event.preventDefault();
      window.location.href = 'aiassistant.html';
    }

    setActiveNav();

    if (assistantButton) {
      assistantButton.addEventListener('click', navigateToAssistant);
    }

    if (floatingAssistant) {
      floatingAssistant.addEventListener('click', navigateToAssistant);
    }
  </script>
</body>
</html>