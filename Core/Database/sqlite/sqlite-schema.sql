
CREATE TABLE clientqoutes (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT,
  email TEXT UNIQUE,
  project_title TEXT,
  project_type TEXT,
  project_description TEXT,
  is_email_sent BOOLEAN DEFAULT 0,
  email_sent_at TIMESTAMP NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);