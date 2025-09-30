import React, { useEffect, useState } from 'react';
import './LogTable.css';

type Log = {
  id: number;
  message: string;
  source: string;
  log_level: {
    name: string;
  };
};

type ApiResponse = {
  code: number;
  message: string;
  data: {
    current_page: number;
    data: Log[];
    last_page: number;
    next_page_url: string | null;
    prev_page_url: string | null;
    total: number;
  };
};

const API_URL = process.env.REACT_APP_API_URL as string;
const ITEMS_PER_PAGE = Number(process.env.REACT_APP_ITEMS_PER_PAGE) || 30;
const DEBOUNCE_MS = Number(process.env.REACT_APP_DEBOUNCE_MS) || 400;

const LogTable = () => {
  const [logs, setLogs] = useState<Log[]>([]);
  const [filterMsg, setFilterMsg] = useState('');
  const [filterLvl, setFilterLvl] = useState('');
  const [filterSource, setFilterSource] = useState('');
  const [page, setPage] = useState(1);
  const [loading, setLoading] = useState(false);
  const [lastPage, setLastPage] = useState(1);
  const [nextPageUrl, setNextPageUrl] = useState<string | null>(null);
  const [prevPageUrl, setPrevPageUrl] = useState<string | null>(null);

  const fetchLogs = async (url: string, query: string, level: string, source: string) => {
    try {
      setLoading(true);

      const params = new URLSearchParams();
      if (query) params.append('query', query);
      if (level) params.append('level', level);
      if (source) params.append('source', source);
      params.append('paginate', ITEMS_PER_PAGE.toString());

      const targetUrl = url.includes('?') ? `${url}&${params}` : `${url}?${params}`;

      const response = await fetch(targetUrl);
      const json: ApiResponse = await response.json();

      setLogs(json.data.data);
      setPage(json.data.current_page);
      setLastPage(json.data.last_page);
      setNextPageUrl(json.data.next_page_url);
      setPrevPageUrl(json.data.prev_page_url);
    } catch (err) {
      console.error('Error fetching logs:', err);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    const delayDebounce = setTimeout(() => {
      fetchLogs(API_URL, filterMsg, filterLvl, filterSource);
    }, DEBOUNCE_MS);
    return () => clearTimeout(delayDebounce);
  }, [filterMsg, filterLvl, filterSource]);

  return (
    <div className="log-viewer">
      <h1>Log Viewer</h1>

      <div className="log-filters">
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
        <input
          type="text"
          placeholder="Filter by Source"
          value={filterSource}
          onChange={(e) => setFilterSource(e.target.value)}
        />
      </div>

      {loading ? (
        <p>Cargando...</p>
      ) : (
        <table className="log-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Message</th>
              <th>Log Level</th>
              <th>Source</th>
            </tr>
          </thead>
          <tbody>
            {logs.map((log) => (
              <tr key={log.id}>
                <td>{log.id}</td>
                <td>{log.message}</td>
                <td className={`log-level-${log.log_level.name}`}>
                  {log.log_level.name}
                </td>
                <td>{log.source}</td>
              </tr>
            ))}
          </tbody>
        </table>
      )}

      <div className="pagination">
        <button
          onClick={() => prevPageUrl && fetchLogs(prevPageUrl, filterMsg, filterLvl, filterSource)}
          disabled={!prevPageUrl || loading}
        >
          Anterior
        </button>
        <span>
          Página {page} de {lastPage}
        </span>
        <button
          onClick={() => nextPageUrl && fetchLogs(nextPageUrl, filterMsg, filterLvl, filterSource)}
          disabled={!nextPageUrl || loading}
        >
          Siguiente
        </button>
      </div>
    </div>
  );
};

export default LogTable;