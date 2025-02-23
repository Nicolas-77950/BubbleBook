import express, {Request, Response } from 'express';
import Database from 'better-sqlite3';
import cors from 'cors';


const db = new Database('src/database.db');

const app = express();
const port = 5000;


app.use(cors());
app.use(express.json());

app.post('/api/user/insert', (req: Request, res: Response) => {
    const {email, password, last_name, first_name, id_groomer} = req.body;
    
    try {
        const stmt = db.prepare('INSERT INTO users (email, password, last_name, first_name, id_groomer) VALUES (?, ?, ?, ?)');

        const info = stmt.run(email, password, last_name, first_name, id_groomer);

        res.status(201).json({ id: info.lastInsertRowid});
    } catch (error) {
        res.status(500).json({ error: 'Failed to insert user'});
    }
});

app.listen(port, () => {
    console.log('Server is running on port', port);
})