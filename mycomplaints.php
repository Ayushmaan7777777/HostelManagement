<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Complaints - ADGIPS Facility Central</title>
  <link rel="stylesheet" href="mycomplaints.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  
</head>
<body>
  <div class="app">
    <aside class="sidebar">
      <div class="brand">
        <div class="brand-icon">AD</div>
        <div>
          <div class="brand-name">ADGIPS</div>
        </div>
      </div>

     <nav class="space-y-3 text-slate-700">
            <a href="index.php" class="block rounded-2xl px-4 py-3 hover:bg-slate-100">Dashboard</a>
            <a href="mycomplaints.php" class="block rounded-2xl px-4 py-3 bg-slate-100 text-blue-700 font-semibold">My Complaints</a>
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
          <p>Monitoring 1,240 rooms · Block A-D</p>
        </div>
        <div class="top-actions">
          <div class="user-badge">AD</div>
        </div>
      </section>

      <div class="controls-bar">
        <label class="search-bar">
          <span class="search-bar-icon">🔍</span>
          <form method="GET">
             <input type="search" name="search" placeholder="Search complaints....." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
          </form>
        </label>
        <button class="filter-btn">
          <span>⚙️</span> Filters
        </button>
      </div>

   <?php include 'db.php'; ?>

<section class="complaints-list">

<?php
$search = "";

if (isset($_GET['search'])) {
  $search = $conn->real_escape_string($_GET['search']);
  $sql = "SELECT * FROM complaints 
          WHERE complaint LIKE '%$search%' 
          OR room LIKE '%$search%' 
          OR category LIKE '%$search%' 
          OR block LIKE '%$search%'
          ORDER BY id DESC";
} else {
  $sql = "SELECT * FROM complaints ORDER BY id DESC";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {

    $priority = strtolower($row['priority']);

echo "
<div class='complaint-card'>

  <div class='meta-row'>
    <span class='id'>#CM-{$row['id']}</span>
    <br> <br>
    <span class='priority $priority'>{$row['priority']}</span>
  </div>

  <h3>{$row['complaint']}</h3>

  <div class='details'>
    <span>📍 Room {$row['room']}</span>
    <span>🏢 {$row['block']}</span>
     <span class='status'>{$row['status']}</span>
  </div>

  <p style='margin-top:10px; font-size:12px; color:#9ca3af;'>
    {$row['created_at']}
  </p>
 
  <!-- ACTION BUTTONS -->
  <div class='actions'>
   <a href='assign.php?id={$row['id']}' class='btn-assign'>Assign</a>
   <a href='delete.php?id={$row['id']}' class='btn-delete'>Remove</a>
  </div>

</div>
";
  }

} else {
  echo "<p>No complaints found</p>";
}
?>



</section>
    </main>
  </div>

  <div class="floating-chat">💬</div>

  <script>
    const navLinks = document.querySelectorAll('.nav a');
    const searchInput = document.querySelector('.search-bar input');
    const complaintsList = document.querySelector('.complaints-list');
    const floatingChat = document.querySelector('.floating-chat');
    const filterButton = document.querySelector('.filter-btn');

    // const defaultComplaints = [
    //   {
    //     id: '#CM-001',
    //     title: 'Leaking faucet in the bathroom causing water accumulation.',
    //     room: '401',
    //     category: 'PLUMBING',
    //     priority: 'HIGH',
    //     icon: '⏱️',
    //     iconType: 'pending'
    //   },
    //   {
    //     id: '#CM-002',
    //     title: 'The ceiling fan is making a grinding noise and running slow.',
    //     room: '215',
    //     category: 'ELECTRICAL',
    //     priority: 'MEDIUM',
    //     icon: 'ℹ️',
    //     iconType: 'info'
    //   }
    // ];

    function setActiveNav() {
      const currentPage = window.location.pathname.split('/').pop() || 'mycomplaints.html';
      navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPage) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      });
    }

    function createComplaintCard(complaint) {
      const card = document.createElement('article');
      card.className = 'complaint-card';
      card.innerHTML = `
        <div class="complaint-icon ${complaint.iconType}">${complaint.icon}</div>
        <div class="complaint-content">
          <h2 class="complaint-title">${complaint.title}</h2>
          <div class="complaint-meta">
            <span class="complaint-id">ID: ${complaint.id}</span>
            <span class="priority-badge priority-${complaint.priority.toLowerCase()}">${complaint.priority}</span>
          </div>
          <div class="complaint-details">
            <div class="detail-item"><span class="detail-icon">📍</span><span>ROOM ${complaint.room}</span></div>
            <div class="detail-item"><span class="detail-icon">🔧</span><span>${complaint.category}</span></div>
          </div>
        </div>
        <div class="complaint-actions">
          <button class="action-btn btn-assign">ASSIGN</button>
          <button class="action-btn btn-resolve">RESOLVE</button>
        </div>
      `;

      card.querySelector('.btn-assign').addEventListener('click', () => {
        alert(`Assigning complaint ${complaint.id}.`);
      });
      card.querySelector('.btn-resolve').addEventListener('click', () => {
        alert(`Resolving complaint ${complaint.id}.`);
      });
      return card;
    }

    // function loadStoredComplaints() {
    //   const stored = localStorage.getItem('hostelComplaints');
    //   if (!stored) return defaultComplaints;
    //   try {
    //     const saved = JSON.parse(stored);
    //     return Array.isArray(saved) && saved.length > 0 ? saved.map(entry => ({
    //       id: entry.id || `#CM-${Math.floor(Math.random() * 9000) + 1000}`,
    //       title: entry.description || 'No description provided.',
    //       room: entry.room || 'Unknown',
    //       category: (entry.category || 'GENERAL').toUpperCase(),
    //       priority: (entry.priority || 'MEDIUM').toUpperCase(),
    //       icon: (entry.priority || 'MEDIUM').toUpperCase() === 'HIGH' ? '⚠️' : 'ℹ️',
    //       iconType: (entry.priority || 'MEDIUM').toUpperCase() === 'HIGH' ? 'pending' : 'info'
    //     })) : defaultComplaints;
    //   } catch {
    //     return defaultComplaints;
    //   }
    // }

    function renderComplaints(complaints) {
      complaintsList.innerHTML = '';
      if (!complaints.length) {
        complaintsList.innerHTML = `
          <div class="empty-state">
            <div class="empty-state-icon">📭</div>
            <p class="empty-state-text">No complaints found. Create one from File Complaint.</p>
          </div>
        `;
        return;
      }
      complaints.forEach(complaint => complaintsList.appendChild(createComplaintCard(complaint)));
    }

    function filterComplaints(query) {
      const normalized = query.toLowerCase().trim();
      Array.from(complaintsList.children).forEach(card => {
        const visible = card.textContent.toLowerCase().includes(normalized);
        card.style.display = visible ? '' : 'none';
      });
    }

    setActiveNav();
    // renderComplaints(loadStoredComplaints());

    if (searchInput) {
      searchInput.addEventListener('input', event => {
        filterComplaints(event.target.value);
      });
    }

    if (floatingChat) {
      floatingChat.addEventListener('click', () => {
        window.location.href = 'aiassistant.html';
      });
    }

    if (filterButton) {
      filterButton.addEventListener('click', () => {
        alert('Filter functionality coming soon.');
      });
    }
  </script>
</body>
</html>