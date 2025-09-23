import React, { useEffect, useState } from 'react';

type Log = {
  id: number;
  message: string;
  log_level: {
    name: string;
  };
};

const LogTable = () => {
  const [logs, setLogs] = useState<Log[]>([]);
  const [filterMsg, setFilterMsg] = useState('');
  const [filterLvl, setFilterLvl] = useState('');

  useEffect(() => {
    const fetchLogs = async () => {
      const response = await fetch('http://localhost:8000/api/logs');
      const data = await response.json();
      setLogs(data);
    };

    fetchLogs();
  }, []);

  const filteredLogs = logs
    .filter(log => log.message.toLowerCase().includes(filterMsg.toLowerCase()))
    .filter(log => log.log_level.name.toLowerCase().includes(filterLvl.toLowerCase()));

  return (
    <div>
      <div>
        <input
          type="text"
          placeholder="Filter by Message"
          value={filterMsg}
          onChange={(e) => setFilterMsg(e.target.value)}
        />
        <input
          type="text"
          placeholder="Filter by Level"
          value={filterLvl}
          onChange={(e) => setFilterLvl(e.target.value)}
        />
      </div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Log Level</th>
          </tr>
        </thead>
        <tbody>
          {filteredLogs.map(log => (
            <tr key={log.id}>
              <td>{log.id}</td>
              <td>{log.message}</td>
              <td>{log.log_level.name}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default LogTable;