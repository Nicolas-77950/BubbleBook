import express from 'express';
import userRoutes from './routes/userRoutes';
import groomerRoutes from './routes/groomerRoutes';

const app = express();
const PORT = process.env.PORT || 5000;

app.use(express.json());

// Routes
app.use('/api', userRoutes);
app.use('/api', groomerRoutes);

app.listen(PORT, () => {
    console.log(`Serveur démarré sur le port ${PORT}`);
})