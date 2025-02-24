import express, { Request, Response } from 'express';
import Database from 'better-sqlite3';
import cors from 'cors';

const db = new Database("src/database.db");

const app = express();
const port: number = 5000;

app.use(express.json());

app.use(cors({
    origin: 'http://localhost:3000'
}));

app.get('/api/services', (req: Request, res: Response) => {
    const rows = db.prepare('SELECT * FROM Service');
    res.json(rows.all());
});

app.get('/api/services/id', (req: Request, res: Response) => {
    const rows = db.prepare('SELECT service_id FROM Service');
    res.json(rows.all());
});

app.get('/api/services/groomer_id', (req: Request, res: Response) => {
    const rows = db.prepare('SELECT groomer_id FROM Service');
    res.json(rows.all());
});


app.get('/api/services/service_name', (req: Request, res: Response) => {
    const rows = db.prepare('SELECT service_name FROM Service');
    res.json(rows.all());
});

app.get('/api/services/duration', (req: Request, res: Response) => {
    const rows = db.prepare('SELECT duration FROM Service');
    res.json(rows.all());
});
