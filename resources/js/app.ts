import './bootstrap';

// Whitespace die magisch altijd er is weghalen
document.addEventListener('DOMContentLoaded', () => {
    const NoteContent = document.getElementById('NotitieContent');
    if (NoteContent) {
        NoteContent.textContent = "";
    }
    const NoteTitle = document.getElementById('NotitieTitel');
    if (NoteTitle) {
        NoteTitle.textContent = "";
    }
})