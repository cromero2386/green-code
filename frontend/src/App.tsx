import React from 'react';
import LogTable from './components/LogTable';

const App: React.FC = () => {
  return (
    <div>
      <h1>Log Viewer</h1>
      <LogTable />
    </div>
  );
};

export default App;